<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Office;

class OfficeLivewire extends Component {
	public $modal = false;
	public $delete = false;
	public $accion = 'store';
	public $mensaje = '';
	public $me = 'MOFF';
	public $office_id, $nombre, $nit, $telefono, $ciudad, $direccion;
	public function render() {
		return view(
			'admin.office.index',[
				'offices' => Office::get(),
			])->layout('layouts.app',['me'=>$this->me]);
	}
	protected $rules = [
        'nombre' => 'required',
    ];
	public function create() {
		$this->accion = 'store';
		$this->modal = true;
	}
	public function store() {
		$this->validate();
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
		$this->office_id = $office->id;
		$this->nombre = $office->nombre;
		$this->nit = $office->nit;
		$this->telefono = $office->telefono;
		$this->ciudad = $office->ciudad;
		$this->direccion = $office->direccion;

		$this->accion = 'edit';
		$this->modal = true;
	}
	public function update() {
		$office = Office::find($this->office_id);
		$this->validate();
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
		$this->office_id = $id;
		$this->delete = true;
	}
	public function destroy() {
		Office::destroy($this->office_id);
		$this->delete_id = null;
		$this->delete = false;
		$this->mensaje='Sucursal eliminada exitosamente';
	}
	public function limpiar() {
		$this->nombre = '';
		$this->nit = '';
		$this->telefono = '';
		$this->ciudad = '';
		$this->direccion = '';

		$this->modal = false;
		$this->delete = false;
	}
}
