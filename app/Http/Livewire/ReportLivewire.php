<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Dispenser;
use App\Models\Report;
use App\Models\Accounting;
use App\Models\Turn;
use App\Models\Ticket;
use App\Models\Tank;
use App\Models\Driver;
use App\Models\Vehicle;
use Carbon\Carbon;
use Auth;
use PDF;

class ReportLivewire extends Component {
    public $modal = array('active'=>false,'title'=>'','accion'=>'store','url_pdf'=>'');
    public $delete = false;
    public $dispensers;
    public $tickets, $input_busca, $ticket_id, $monto, $driver_id, $vehicle_id, $dispenser_id, $detalle;
    public $meters;
    public $suma;
    public $mensaje = '';
    public $me = 'MARQ';
    public $modelo_id, $fecha, $monto_total, $efectivo, $tarjeta, $firmado, $calibracion, $_200, $_100, $_50, $_20, $_10, $monedas, $user_id, $turn_id;

    public function render() {
        $office_id = Auth::user()->people->office_id;
        $this->suma = (($this->_200==null)?0:$this->_200)*200 + (($this->_100==null)?0:$this->_100)*100 + (($this->_50==null)?0:$this->_50)*50 + (($this->_20==null)?0:$this->_20)*20 + (($this->_10==null)?0:$this->_10)*10 + (($this->monedas==null)?0:$this->monedas);
        if (Auth::user()->role_id <= 3) {
            $reports = Report::where('office_id',$office_id)->orderBy('fecha','desc')->orderBy('id','desc')->paginate(15);
        } else {
            $reports = Report::where('office_id',$office_id)->where('user_id',Auth::id())->orderBy('fecha','desc')->orderBy('id','desc')->paginate(15);
        }
        return view(
            'admin.report.index',[
                'dispensers_list' => Dispenser::where('office_id',$office_id)->orderBy('id','asc')->get(),
                'turns' => Turn::where('office_id',$office_id)->orderBy('id','asc')->get(),
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
        $this->limpiar();
        $this->mensaje='Arqueo creado exitosamente';
        /*$this->openModalPDF($report->id);*/
    }
    public function edit($id) {
        $report = Report::find($id);
        if (!$report->editar()) {
            $this->mensaje='Este arqueo ya no se puede editar, por favor actualize la página';
            return null;
        }
        $this->modelo_id = $id;
        $this->fecha = $report->fecha;
        $this->suma = $report->suma;
        $this->tarjeta = $report->tarjeta;
        $this->firmado = $report->firmado;
        $this->calibracion = $report->calibracion;
        $this->_200 = $report->_200;
        $this->_100 = $report->_100;
        $this->_50 = $report->_50;
        $this->_20 = $report->_20;
        $this->_10 = $report->_10;
        $this->monedas = $report->monedas;
        $this->turn_id = $report->turn_id;
        $this->dispensers = collect();
        $this->meters = collect();
        $this->meter_inicial = collect();
        foreach (Dispenser::where('office_id',Auth::user()->people->office_id)->get() as $key => $dispenser) {
            $account = Accounting::where('report_id',$id)->where('dispenser_id',$dispenser->id)->first();
            if (isset($account->id)) {
                $this->dispensers->put($dispenser->id,"$dispenser->id");
                $this->meters->put($dispenser->id,"$account->meter_final");
                $this->meter_inicial->put($dispenser->id,$account->meter_inicial);
            } else {
                $this->dispensers->put($dispenser->id,false);
                $this->meters->put($dispenser->id,false);
                $this->meter_inicial->put($dispenser->id,$dispenser->meter);
            }
        }

        $this->modal['accion'] = 'edit';
        $this->modal['active'] = true;
        $this->modal['title'] = 'Editar de Arqueo #'.$report->id;
    }
    public function update() {
        $this->validate([
            'fecha' => 'required',
            'turn_id' => 'required',
            'meters' => 'required',
        ]);
        $report = Report::find($this->modelo_id);
        if (!$report->editar()) {
            $this->mensaje='Este arqueo ya no se puede editar, por favor actualize la página';
            return null;
        }
        if ($this->suma==null) { $this->suma = 0; }
        if ($this->tarjeta==null) { $this->tarjeta = 0; }
        $report->update([
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
            'turn_id' => $this->turn_id,
        ]);
        foreach ($report->accountings as $key => $account) {
            $dispenser = Dispenser::find($account->dispenser_id);
            if ($dispenser->tank->fuel->unidad == 'L') {
                $tank = Tank::find($dispenser->tank_id);
                $tank->actual += $account->cantidad;
                $tank->update();
            }
            $dispenser->meter = $account->meter_inicial;
            $dispenser->update();
            Accounting::destroy($account->id);
        }
        if ($this->dispensers!=null) {
            foreach ($this->dispensers as $key => $dis) {
                if ($dis) {
                    $dispenser = Dispenser::find($dis);
                    $accounting = Accounting::create([
                        'meter_inicial' => $this->meter_inicial[$dis],
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
        $this->meters = null;
        $this->meter_inicial = null;

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
    public function agregar_ticket($id) {
        $report = Report::find($id);
        $office_id = Auth::user()->people->office_id;
        $this->modelo_id = $id;
        $this->tickets = Ticket::join('lots', 'lots.id', '=', 'tickets.lot_id')->select('tickets.*')->where('lots.office_id',$office_id)->get();
        $this->drivers = Driver::join('clients', 'clients.id', '=', 'drivers.client_id')->select('drivers.*')->where('clients.office_id',$office_id)->get();
        $this->vehicles = Vehicle::join('clients', 'clients.id', '=', 'vehicles.client_id')->select('vehicles.*')->where('clients.office_id',$office_id)->get();
        $this->dispensers = Dispenser::where('office_id',$office_id)->get();
        $this->turns = Turn::where('office_id',$office_id)->get();

        $this->modal['accion'] = 'ticket';
        $this->modal['active'] = true;
        $this->modal['title'] = 'Agregar Vales';
    }
    public function save_ticket() {
        $this->validate([
            'ticket_id' => 'required',
            'monto' => 'required',
            'driver_id' => 'required',
            'vehicle_id' => 'required',
            'dispenser_id' => 'required',
            'turn_id' => 'required',
        ]);
        $ticket = Ticket::find($this->ticket_id);
        if ($ticket->estado == 'Activo') {
            $ticket->update([
                'estado' => 'Usado',
                'fecha_uso' => Carbon::now(),
                'monto' => $this->monto,
                'driver_id' => $this->driver_id,
                'vehicle_id' => $this->vehicle_id,
                'dispenser_id' => $this->dispenser_id,
                'turn_id' => $this->turn_id,
                'detalle' => $this->detalle,
                'report_id' => $this->modelo_id,
                'user_id' => Auth::id(),
            ]);
            $this->mensaje = 'Ticket '.$ticket->codigo.$ticket->serie.' Activado Exitosamente';
        } else {
            $this->mensaje = 'El ticket '.$ticket->codigo.$ticket->serie.' no está habilitado o ya esta usado';
        }
        $this->limpiar_ticket();
    }
    public function limpiar_ticket() {
        $this->input_busca = null;
        $this->ticket_id = null;
        $this->monto = null;
        $this->driver_id = null;
        $this->vehicle_id = null;
        $this->dispenser_id = null;
        $this->turn_id = null;
        $this->detalle = null;
        $this->tickets = Ticket::join('lots', 'lots.id', '=', 'tickets.lot_id')->select('tickets.*')->where('lots.office_id',Auth::user()->people->office_id)->get();
    }
}