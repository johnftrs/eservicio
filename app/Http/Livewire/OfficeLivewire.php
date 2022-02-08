<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Office;
use App\Models\Ticket;
use Auth;

class OfficeLivewire extends Component {
	public $modal = false;
	public $delete = false;
	public $accion = 'store';
	public $mensaje = '';
	public $me = 'MOFF';
	public $modelo_id, $nombre, $nit, $telefono, $ciudad, $direccion;
	
	public function render() {
		$office_id = Auth::user()->people->office_id;
		return view(
			'admin.office.index',[
				'offices' => Office::get(),
			])->layout('layouts.app',['me'=>$this->me,'tickets' => Ticket::get()]);
	}
	public function create() {
		$this->accion = 'store';
		$this->modal = true;
	}
	public function store() {
		$this->validate([
			'nombre' => 'required',
		]);
		Office::create([
			'nombre' => $this->nombre,
			'nit' => $this->nit,
			'telefono' => $this->telefono,
			'ciudad' => $this->ciudad,
			'direccion' => $this->direccion,
		]);
		$this->limpiar();
		$this->mensaje='Sucursal creada exitosamente';
	}
	public function edit($id) {
		$office = Office::find($id);
		$this->modelo_id = $office->id;
		$this->nombre = $office->nombre;
		$this->nit = $office->nit;
		$this->telefono = $office->telefono;
		$this->ciudad = $office->ciudad;
		$this->direccion = $office->direccion;

		$this->accion = 'edit';
		$this->modal = true;
	}
	public function update() {
		$office = Office::find($this->modelo_id);
		$this->validate([
			'nombre' => 'required',
		]);
		$office->update([
			'nombre' => $this->nombre,
			'nit' => $this->nit,
			'telefono' => $this->telefono,
			'ciudad' => $this->ciudad,
			'direccion' => $this->direccion,
		]);
		$this->limpiar();
		$this->mensaje='Sucursal editada exitosamente';
	}
	public function select($id) {
		$this->modelo_id = $id;
		$this->delete = true;
	}
	public function destroy() {
		Office::destroy($this->modelo_id);
		$this->delete_id = null;
		$this->delete = false;
		$this->mensaje='Sucursal eliminada exitosamente';
	}
	public function limpiar() {
		$this->nombre = null;
		$this->nit = null;
		$this->telefono = null;
		$this->ciudad = null;
		$this->direccion = null;

		$this->modal = false;
		$this->delete = false;
	}
}
