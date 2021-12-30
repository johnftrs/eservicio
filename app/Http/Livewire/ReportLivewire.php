<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Dispenser;
use App\Models\Report;
use App\Models\Accounting;
use App\Models\Turn;
use App\Models\Ticket;
use Carbon\Carbon;
use Auth;
use PDF;

class ReportLivewire extends Component {
    public $modal = false;
    public $delete = false;
    public $accion = 'store';
    public $url_pdf;
    public $dispensers;
    public $tickets;
    public $meters;
    public $suma;
    public $mensaje = '';
    public $me = 'MARQ';
    public $modelo_id, $fecha, $monto_total, $efectivo, $tarjeta, $firmado, $_200, $_100, $_50, $_20, $_10, $monedas, $user_id, $turn_id;
    public function render() {
        $this->suma = (($this->_200==null)?0:$this->_200)*200 + (($this->_100==null)?0:$this->_100)*100 + (($this->_50==null)?0:$this->_50)*50 + (($this->_20==null)?0:$this->_20)*20 + (($this->_10==null)?0:$this->_10)*10 + (($this->monedas==null)?0:$this->monedas);
        return view(
            'admin.report.index',[
                'dispensers_list' => Dispenser::where('office_id',Auth::user()->people->office_id)->orderBy('id','asc')->get(),
                'turns' => Turn::where('office_id',Auth::user()->people->office_id)->orderBy('id','asc')->get(),
                'tickets_list' => Ticket::where('office_id',Auth::user()->people->office_id)->where('user_id',Auth::id())->where('estado','Usado')->orderBy('id','asc')->get(),
                'reports' => Report::where('user_id',Auth::id())->orderBy('id','desc')->get(),
            ])->layout('layouts.app',['me'=>$this->me]);
    }
    public function create() {
        $this->accion = 'store';
        $this->modal = true;
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
            'fecha' => Carbon::createFromFormat('d/m/y', $this->fecha)->format('Y-m-d'),
            'monto_total' => $this->suma + $this->tarjeta,
            'efectivo' => $this->suma,
            'tarjeta' => $this->tarjeta,
            'firmado' => $this->firmado,
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
                    Accounting::create([
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
    public function edit($id) {
        $report = Report::find($id);
        $this->modelo_id = $report->id;
        $this->fecha = $report->fecha;
        $this->efectivo = $report->efectivo;
        $this->tarjeta = $report->tarjeta;
        $this->firmado = $report->firmado;
        $this->_200 = $report->_200;
        $this->_100 = $report->_100;
        $this->_50 = $report->_50;
        $this->_20 = $report->_20;
        $this->_10 = $report->_10;
        $this->monedas = $report->monedas;
        $this->turn_id = $report->turn_id;
        foreach ($report->accountings as $key => $accounting) {
            $this->dispensers[$accounting->dispenser_id] = $accounting->dispenser_id;
        }
        $this->accion = 'edit';
        $this->modal = true;
    }
    public function update() {
        $report = Report::find($this->modelo_id);
        $this->validate([
            'fecha' => 'required',
            'turn_id' => 'required',
        ]);
        $report->update([
            'fecha' => $this->fecha,
            'monto_total' => $this->suma,
            'efectivo' => $this->efectivo,
            'tarjeta' => $this->tarjeta,
            'firmado' => $this->firmado,
            '_200' => ($this->_200==null)?0:$this->_200,
            '_100' => ($this->_100==null)?0:$this->_100,
            '_50' => ($this->_50==null)?0:$this->_50,
            '_20' => ($this->_20==null)?0:$this->_20,
            '_10' => ($this->_10==null)?0:$this->_10,
            'monedas' => ($this->monedas==null)?0:$this->monedas,
            'user_id' => Auth::id(),
            'turn_id' => $this->turn_id,
        ]);
        $this->limpiar();
        $this->mensaje='Arqueo editado exitosamente';
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
        $this->fecha = '';
        $this->efectivo = '';
        $this->tarjeta = '';
        $this->firmado = '';
        $this->_200 = '';
        $this->_100 = '';
        $this->_50 = '';
        $this->_20 = '';
        $this->_10 = '';
        $this->monedas = '';
        $this->turn_id = '';
        $this->dispensers = null;

        $this->modal = false;
        $this->delete = false;
    }
    public function openModalPDF($report_id) {
        $report = Report::find($report_id);
        $this->url_pdf = 'admin/ARQUEO-PDF/'.$report_id;
        $pdf = PDF::loadView('pdf.arqueo', compact('report'));
        //return view('pdf.arqueo',['report'=>$report]);
        return $pdf->setPaper('letter', 'portrait')->stream('Arqueo.pdf');
        //return "pdf";
    }
    public function test_openModalPDF($report_id) {
        $report = Report::find($report_id);
        $this->url_pdf = 'admin/ARQUEO-PDF/'.$report_id;
        $pdf = PDF::loadView('pdf.arqueo', compact('report'));
        return view('pdf.arqueo',['report'=>$report]);
    }
}