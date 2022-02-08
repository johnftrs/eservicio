<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Mensuration;
use App\Models\Ticket;
use App\Models\Report;
use App\Models\Factor;
use Carbon\Carbon;
use Auth;

class MensurationLivewire extends Component {
    public $modal = false;
    public $delete = false;
    public $accion = 'store';
    public $mensaje = '';
    public $me = 'MLEC';
    public $po = 'LEC';
    public $modelo_id, $lectura, $fecha, $hora, $observaciones;
    
    public function render() {
        $office_id = Auth::user()->people->office_id;
        return view(
            'admin.mensuration.index',[
                'mensurations' => Mensuration::orderBy('fecha','desc')->get(),
            ])->layout('layouts.app',['me'=>$this->me,'po'=>$this->po,'tickets' => Ticket::get()]);
    }
    public function create() {
        $this->accion = 'store';
        $this->modal = true;
    }
    public function store() {
        $this->validate([
            'lectura' => 'required',
        ]);
        Mensuration::create([
            'lectura' => $this->lectura,
            'fecha' => $this->fecha,
            'hora' => $this->hora,
            'observaciones' => $this->observaciones,
            'office_id' => Auth::user()->people->office_id,
            'user_id' => Auth::id(),
        ]);
        $this->limpiar();
        $fecha1 = Carbon::parse($this->fecha)->subDay()->format('Y-m-d');
        $report_monto = Report::where('fecha',$fecha1)->get()->sum('monto_total');
        
        $lectura_anterior = Mensuration::where('fecha',$fecha1)->first()->lectura;
        $consumo = $this->lectura - $lectura_anterior;
        $factor = Factor::orderBy('fecha_inicial','desc')->first()->factor;
        $m3 = intval($consumo*$factor);
        $venta = intval($report_monto);
        $diferencia = intval($venta - $m3);
        $diff = $venta/$m3*100 - 100;
        if ($diff > 2 || $diff < -2) {
            $this->mensaje='El porcentaje de diferencia supera el 2%';
            /*Mail::send('emails.msg_send', ['msg' => $request], function($message) use ($request) {
                $message->from($request['email'], $request['name']);
                $message->to('informacion@institutocien.com', 'Instituto CIEN')->subject('Envío de Mensaje');
            });*/
        } else {
            $this->mensaje='Lectura creada exitosamente';
        }
    }
    public function edit($id) {
        $mensuration = Mensuration::find($id);
        $this->modelo_id = $mensuration->id;
        $this->lectura = $mensuration->lectura;
        $this->fecha = $mensuration->fecha;
        $this->hora = $mensuration->hora;
        $this->observaciones = $mensuration->observaciones;

        $this->accion = 'edit';
        $this->modal = true;
    }
    public function update() {
        $mensuration = Mensuration::find($this->modelo_id);
        $this->validate([
            'lectura' => 'required',
        ]);
        $mensuration->update([
            'lectura' => $this->lectura,
            'fecha' => $this->fecha,
            'hora' => $this->hora,
            'observaciones' => $this->observaciones,
            'office_id' => Auth::user()->people->office_id,
            'user_id' => Auth::id(),
        ]);
        $this->limpiar();
        $this->mensaje='Lectura editada exitosamente';
    }
    public function select($id) {
        $this->modelo_id = $id;
        $this->delete = true;
    }
    public function destroy() {
        Mensuration::destroy($this->modelo_id);
        $this->delete_id = null;
        $this->delete = false;
        $this->mensaje='Lectura eliminada exitosamente';
    }
    public function limpiar() {
        $this->lectura = null;
        $this->fecha = null;
        $this->hora = null;
        $this->observaciones = null;

        $this->modal = false;
        $this->delete = false;
    }
}
