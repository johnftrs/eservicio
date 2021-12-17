<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Office;
use App\Models\Location;

class OfficeLivewire extends Component
{
	public $modal = false;
	public $delete = false;
	public $accion = 'store';
	public $me = 'MOFF';
	public $office_id, $nombre, $nit, $direccion, $coordenada, $location_id;
	public function render() {
		return view(
			'admin.office.index',[
				'locations' => Location::get(),
				'offices' => Office::get(),
			])->layout('layouts.app',['me'=>$this->me]);
	}
	protected $rules = [
        'nombre' => 'required',
        'location_id' => 'required',
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
			'direccion' => $this->direccion,
			'coordenada' => $this->coordenada,
			'location_id' => $this->location_id
		]);
		$this->limpiar();
	}
	public function edit($id) {
		$office = Office::find($id);
		$this->office_id = $office->id;
		$this->nombre = $office->nombre;
		$this->nit = $office->nit;
		$this->direccion = $office->direccion;
		$this->coordenada = $office->coordenada;
		$this->location_id = $office->location_id;

		$this->accion = 'edit';
		$this->modal = true;
	}
	public function update() {
		$office = Office::find($this->office_id);
		$this->validate();
		$office->update([
			'nombre' => $this->nombre,
			'nit' => $this->nit,
			'direccion' => $this->direccion,
			'coordenada' => $this->coordenada,
			'location_id' => $this->location_id
		]);
		$this->limpiar();
	}
	public function select($id) {
		$this->office_id = $id;
		$this->delete = true;
	}
	public function destroy() {
		Office::destroy($this->office_id);
		$this->delete_id = null;
		$this->delete = false;
	}
	public function limpiar() {
		$this->nombre = '';
		$this->nit = '';
		$this->direccion = '';
		$this->coordenada = '';
		$this->location_id = '';

		$this->modal = false;
		$this->delete = false;
	}
}
