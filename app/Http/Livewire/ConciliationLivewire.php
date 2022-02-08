<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Conciliation;
use App\Models\Bank;
use App\Models\Ticket;
use App\Models\Report;
use PDF;
use Auth;

class ConciliationLivewire extends Component {
    public $modal = array('active'=>false,'title'=>'','accion'=>'store','url_pdf'=>'');
    public $delete = false;
    public $mensaje = '';
    public $me = 'MCON';
    public $modelo_id, $fecha, $fecha_deposito, $fecha_conciliacion, $deposito, $nro_deposito, $monto, $observaciones, $bank_id;
    
    public function render() {
        $office_id = Auth::user()->people->office_id;
        return view(
            'admin.conciliation.index',[
                'banks' => Bank::where('office_id',$office_id)->get(),
                'conciliations' => Conciliation::orderBy('fecha','desc')->get(),
            ])->layout('layouts.app',['me'=>$this->me,'tickets' => Ticket::get()]);
    }
    public function create() {
        $this->modal['accion'] = 'store';
        $this->modal['active'] = true;
        $this->modal['title'] = 'Registrar Conciliación';
    }
    public function get_suma() {
    	$this->monto = Report::where('fecha',$this->fecha)->where('office_id',Auth::user()->people->office_id)->get()->sum('efectivo');
    }
    public function store() {
        $this->validate([
            'fecha' => 'required',
            'deposito' => 'required',
            'bank_id' => 'required',
        ]);
        $conciliation = Conciliation::create([
            'fecha' => $this->fecha,
            'fecha_deposito' => $this->fecha_deposito,
            'fecha_conciliacion' => $this->fecha_conciliacion,
            'deposito' => $this->deposito,
            'monto' => $this->monto,
            'nro_deposito' => $this->nro_deposito,
            'observaciones' => $this->observaciones,
            'bank_id' => $this->bank_id,
            'office_id' => Auth::user()->people->office_id,
            'user_id' => Auth::id(),
        ]);

        $bank = Bank::find($this->bank_id);
        $bank->monto += $this->deposito;
        $bank->update();

        $this->limpiar();
        $this->mensaje='Conciliación creada exitosamente';
        $this->openModalPDF($conciliation->id);
    }
    public function edit($id) {
        $conciliation = Conciliation::find($id);
        $this->fecha = $conciliation->fecha;
        $this->fecha_deposito = $conciliation->fecha_deposito;
        $this->fecha_conciliacion = $conciliation->fecha_conciliacion;
        $this->deposito = $conciliation->deposito;
        $this->nro_deposito = $conciliation->nro_deposito;
        $this->observaciones = $conciliation->observaciones;
        $this->bank_id = $conciliation->bank_id;

        $this->modal['accion'] = 'edit';
        $this->modal['active'] = true;
        $this->modal['title'] = 'Editar Conciliación';
    }
    public function update() {
        $conciliation = Conciliation::find($this->modelo_id);
        $this->validate([
            'fecha' => 'required',
            'deposito' => 'required',
            'bank_id' => 'required',
        ]);
        $conciliation->update([
            'fecha' => $this->fecha,
            'fecha_deposito' => $this->fecha_deposito,
            'fecha_conciliacion' => $this->fecha_conciliacion,
            'deposito' => $this->deposito,
            'nro_deposito' => $this->nro_deposito,
            'observaciones' => $this->observaciones,
            'bank_id' => $this->bank_id,
            'user_id' => Auth::id(),
        ]);
        $this->limpiar();
        $this->mensaje='Conciliación editada exitosamente';
    }
    public function select($id) {
        $this->modelo_id = $id;
        $this->delete = true;
    }
    public function destroy() {
        Conciliation::destroy($this->modelo_id);
        $this->delete_id = null;
        $this->delete = false;
        $this->mensaje='Conciliación eliminada exitosamente';
    }
    public function limpiar() {
        $this->fecha = null;
        $this->fecha_deposito = null;
        $this->fecha_conciliacion = null;
        $this->deposito = null;
        $this->nro_deposito = null;
        $this->observaciones = null;
        $this->bank_id = null;

        $this->modal['active'] = false;
        $this->modal['title'] = '';
        $this->modal['url_pdf'] = '';
        $this->modal['accion'] = '';
        $this->delete = false;
    }
    public function openModalPDF($conciliation_id) {
        $this->modal['accion'] = 'pdf';
        $this->modal['active'] = true;
        $this->modal['title'] = 'Imprimir Conciliación #'.$conciliation_id;
        $this->modal['url_pdf'] = 'admin/CONCILIACION-PDF/'.$conciliation_id;
        $conciliation = Conciliation::find($conciliation_id);
        $pdf = PDF::loadView('pdf.conciliacion', compact('conciliation'));
        return $pdf->setPaper('letter', 'portrait')->stream('Conciliación.pdf');
    }
}
