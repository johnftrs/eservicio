<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Location;
use App\Models\City;
use Auth;

class LocationLivewire extends Component
{
	public $modal = false;
	public $delete = false;
	public $accion = 'store';
	public $mensaje = '';
	public $me = 'MLOC';
	public $modelo_id, $nombre, $coordenada, $city_id;
	public function render() {
		return view(
			'admin.location.index',[
				'locations' => Location::orderBy('nombre','asc')->get(),
				'cities' => City::get(),
			])->layout('layouts.app',['me'=>$this->me]);
	}
	protected $rules = [
        'nombre' => 'required',
        'city_id' => 'required',
    ];
	public function create() {
		$this->accion = 'store';
		$this->modal = true;
	}
	public function store() {
		$this->validate();
		Location::create([
			'nombre' => $this->nombre,
			'coordenada' => $this->coordenada,
			'city_id' => $this->city_id,
		]);
		$this->limpiar();
		$this->mensaje='Localidad creada exitosamente';
	}
	public function edit($id) {
		$location = Location::find($id);
		$this->modelo_id = $location->id;
		$this->nombre = $location->nombre;
		$this->coordenada = $location->coordenada;
		$this->city_id = $location->city_id;

		$this->accion = 'edit';
		$this->modal = true;
	}
	public function update() {
		$location = Location::find($this->modelo_id);
		$this->validate();
		$location->update([
			'nombre' => $this->nombre,
			'coordenada' => $this->coordenada,
			'city_id' => $this->city_id,
		]);
		$this->limpiar();
		$this->mensaje='Localidad creada exitosamente';
	}
	public function select($id) {
		$this->modelo_id = $id;
		$this->delete = true;
	}
	public function destroy() {
		Location::destroy($this->modelo_id);
		$this->delete_id = null;
		$this->delete = false;
		$this->mensaje='Localidad creada exitosamente';
	}
	public function limpiar() {
		$this->nombre = '';
		$this->coordenada = '';
		$this->city_id = '';

		$this->modal = false;
		$this->delete = false;
	}
}
