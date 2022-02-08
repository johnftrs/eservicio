<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Factor;
use App\Models\Ticket;
use Auth;

class FactorLivewire extends Component {
    public $modal = false;
    public $delete = false;
    public $accion = 'store';
    public $mensaje = '';
    public $me = 'MLEC';
    public $po = 'FAC';
    public $modelo_id, $factor, $fecha_inicial, $fecha_final;
    
    public function render() {
        $office_id = Auth::user()->people->office_id;
        return view(
            'admin.factor.index',[
                'factors' => Factor::get(),
            ])->layout('layouts.app',['me'=>$this->me,'po'=>$this->po,'tickets' => Ticket::get()]);
    }
    public function create() {
        $this->accion = 'store';
        $this->modal = true;
    }
    public function store() {
        $this->validate([
            'factor' => 'required',
        ]);
        Factor::create([
            'factor' => $this->factor,
            'fecha_inicial' => $this->fecha_inicial,
            'fecha_final' => $this->fecha_final,
            'office_id' => Auth::user()->people->office_id,
            'user_id' => Auth::id(),
        ]);
        $this->limpiar();
        $this->mensaje='Factor creada exitosamente';
    }
    public function edit($id) {
        $factor = Factor::find($id);
        $this->modelo_id = $factor->id;
        $this->factor = $factor->factor;
        $this->fecha_inicial = $factor->fecha_inicial;
        $this->fecha_final = $factor->fecha_final;

        $this->accion = 'edit';
        $this->modal = true;
    }
    public function update() {
        $factor = Factor::find($this->modelo_id);
        $this->validate([
            'factor' => 'required',
        ]);
        $factor->update([
            'factor' => $this->factor,
            'fecha_inicial' => $this->fecha_inicial,
            'fecha_final' => $this->fecha_final,
            'office_id' => Auth::user()->people->office_id,
            'user_id' => Auth::id(),
        ]);
        $this->limpiar();
        $this->mensaje='Factor editada exitosamente';
    }
    public function select($id) {
        $this->modelo_id = $id;
        $this->delete = true;
    }
    public function destroy() {
        Factor::destroy($this->modelo_id);
        $this->delete_id = null;
        $this->delete = false;
        $this->mensaje='Factor eliminada exitosamente';
    }
    public function limpiar() {
        $this->factor = null;
        $this->fecha_inicial = null;
        $this->fecha_final = null;

        $this->modal = false;
        $this->delete = false;
    }
}
