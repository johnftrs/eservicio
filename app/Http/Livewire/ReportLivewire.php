<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Dispenser;
use App\Models\Report;
use App\Models\Accounting;
use App\Models\Turn;
use App\Models\Ticket;
use App\Models\Tank;
use Carbon\Carbon;
use Auth;
use PDF;

class ReportLivewire extends Component {
    public $modal = array('active'=>false,'title'=>'','accion'=>'store','url_pdf'=>'');
    public $delete = false;
    public $dispensers;
    public $tickets;
    public $meters;
    public $suma;
    public $mensaje = '';
    public $me = 'MARQ';
    public $modelo_id, $fecha, $monto_total, $efectivo, $tarjeta, $firmado, $calibracion, $_200, $_100, $_50, $_20, $_10, $monedas, $user_id, $turn_id;
    public function render() {
        $this->suma = (($this->_200==null)?0:$this->_200)*200 + (($this->_100==null)?0:$this->_100)*100 + (($this->_50==null)?0:$this->_50)*50 + (($this->_20==null)?0:$this->_20)*20 + (($this->_10==null)?0:$this->_10)*10 + (($this->monedas==null)?0:$this->monedas);
        if (Auth::user()->role_id <= 3) {
            $reports = Report::where('office_id',Auth::user()->people->office_id)->orderBy('id','desc')->paginate(15);
        } else {
            $reports = Report::where('office_id',Auth::user()->people->office_id)->where('user_id',Auth::id())->orderBy('id','desc')->paginate(15);
        }
        return view(
            'admin.report.index',[
                'dispensers_list' => Dispenser::where('office_id',Auth::user()->people->office_id)->orderBy('id','asc')->get(),
                'turns' => Turn::where('office_id',Auth::user()->people->office_id)->orderBy('id','asc')->get(),
                'tickets_list' => Ticket::where('office_id',Auth::user()->people->office_id)->where('estado','Usado')->orderBy('id','asc')->get(),
                'reports' => $reports,
            ])->layout('layouts.app',['me'=>$this->me]);
    }
    public function create() {
        $this->modal['accion'] = 'store';
        $this->modal['active'] = true;
        $this->modal['title'] = 'Registro de Arqueo';
    }
    public function store() {
        $this->validate([
            'fecha' => 'required',
            'turn_id' => 'required',
            'meters' => 'required',
        ]);
        if ($this->suma==null) { $this->suma = 0; }
        if ($this->tarjeta==null) { $this->tarjeta = 0; }
        $report = Report::create([
            'fecha' => $this->fecha,
            'monto_total' => $this->suma + $this->tarjeta,
            'efectivo' => $this->suma,
            'tarjeta' => $this->tarjeta,
            'firmado' => $this->firmado,
            'calibracion' => ($this->calibracion==null)?0:$this->calibracion,
            '_200' => ($this->_200==null)?0:$this->_200,
            '_100' => ($this->_100==null)?0:$this->_100,
            '_50' => ($this->_50==null)?0:$this->_50,
            '_20' => ($this->_20==null)?0:$this->_20,
            '_10' => ($this->_10==null)?0:$this->_10,
            'monedas' => ($this->monedas==null)?0:$this->monedas,
            'user_id' => Auth::id(),
            'turn_id' => $this->turn_id,
            'office_id' => Auth::user()->people->office_id,
        ]);
        if ($this->dispensers!=null) {
            foreach ($this->dispensers as $key => $dis) {
                if ($dis) {
                    $dispenser = Dispenser::find($dis);
                    $accounting = Accounting::create([
                        'meter_inicial' => $dispenser->meter,
                        'meter_final' => $this->meters[$dis],
                        'cantidad' => $this->meters[$dis]-Dispenser::find($dis)->meter,
                        'turn_id' => $this->turn_id,
                        'user_id' => Auth::id(),
                        'report_id' => $report->id,
                        'dispenser_id' => $dispenser->id,
                        'office_id' => Auth::user()->people->office_id,
                    ]);
                    $dispenser->meter = $this->meters[$dis];
                    $dispenser->update();
                    if ($dispenser->tank->fuel->unidad == 'L') {
                        $tank = Tank::find($dispenser->tank_id);
                        $tank->actual -= $accounting->cantidad;
                        $tank->update();
                    }
                }
            }
        }
        if ($this->tickets!=null) {
            foreach ($this->tickets as $key => $tick) {
                if ($tick) {
                    $ticket = Ticket::find($tick);
                    $ticket->update([
                        'estado' => 'Registrado',
                        'report_id' => $report->id,
                    ]);
                }
            }
        }
        $this->limpiar();
        $this->mensaje='Arqueo creado exitosamente';
        $this->openModalPDF($report->id);
    }
    public function select($id) {
        $this->modelo_id = $id;
        $this->delete = true;
    }
    public function destroy() {
        Report::destroy($this->modelo_id);
        $this->delete_id = null;
        $this->delete = false;
        $this->mensaje='Arqueo eliminado exitosamente';
    }
    public function limpiar() {
        $this->fecha = null;
        $this->efectivo = null;
        $this->tarjeta = null;
        $this->firmado = null;
        $this->calibracion = null;
        $this->_200 = null;
        $this->_100 = null;
        $this->_50 = null;
        $this->_20 = null;
        $this->_10 = null;
        $this->monedas = null;
        $this->turn_id = null;
        $this->dispensers = null;

        $this->modal['active'] = false;
        $this->modal['title'] = '';
        $this->modal['url_pdf'] = '';
        $this->modal['accion'] = '';
        $this->delete = false;
    }
    public function openModalPDF($report_id) {
        $this->modal['accion'] = 'pdf';
        $this->modal['active'] = true;
        $this->modal['title'] = 'Imprimir Arqueo #'.$report_id;
        $this->modal['url_pdf'] = 'admin/ARQUEO-PDF/'.$report_id;
        $report = Report::find($report_id);
        $pdf = PDF::loadView('pdf.arqueo', compact('report'));
        return $pdf->setPaper('letter', 'portrait')->stream('Arqueo.pdf');
    }
}