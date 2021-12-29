<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Turn;
use Auth;

class TurnLivewire extends Component {
    public $modal = false;
    public $delete = false;
    public $accion = 'store';
    public $mensaje = '';
    public $me = 'MOFF';
    public $modelo_id, $nombre, $estado, $hora_inicio, $hora_fin, $office_id;
    public function render() {
        return view(
            'admin.turn.index',[
                'turns' => Turn::where('office_id',Auth::user()->people->office_id)->get(),
            ])->layout('layouts.app',['me'=>$this->me]);
    }
    public function create() {
        $this->accion = 'store';
        $this->modal = true;
    }
    public function store() {
        $this->validate([
            'nombre' => 'required',
        ]);
        Turn::create([
            'nombre' => $this->nombre,
            'estado' => $this->estado,
            'hora_inicio' => $this->hora_inicio,
            'hora_fin' => $this->hora_fin,
            'office_id' => Auth::user()->people->office_id,
        ]);
        $this->limpiar();
        $this->mensaje='Turno creado exitosamente';
    }
    public function edit($id) {
        $turn = Turn::find($id);
        $this->modelo_id = $turn->id;
        $this->nombre = $turn->nombre;
        $this->estado = $turn->estado;
        $this->hora_inicio = $turn->hora_inicio;
        $this->hora_fin = $turn->hora_fin;

        $this->accion = 'edit';
        $this->modal = true;
    }
    public function update() {
        $turn = Turn::find($this->modelo_id);
        $this->validate([
            'nombre' => 'required',
        ]);
        $turn->update([
            'nombre' => $this->nombre,
            'estado' => $this->estado,
            'hora_inicio' => $this->hora_inicio,
            'hora_fin' => $this->hora_fin,
        ]);
        $this->limpiar();
        $this->mensaje='Turno editado exitosamente';
    }
    public function select($id) {
        $this->modelo_id = $id;
        $this->delete = true;
    }
    public function destroy() {
        Turn::destroy($this->modelo_id);
        $this->delete_id = null;
        $this->delete = false;
        $this->mensaje='Turno eliminado exitosamente';
    }
    public function limpiar() {
        $this->nombre = '';
        $this->estado = '';
        $this->hora_inicio = '';
        $this->hora_fin = '';

        $this->modal = false;
        $this->delete = false;
    }
}
