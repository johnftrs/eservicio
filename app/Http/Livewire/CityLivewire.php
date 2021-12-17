<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\City;

class CityLivewire extends Component
{
	public $modal = false;
	public $delete = false;
	public $accion = 'store';
	public $me = 'MCIT';
	public $modelo_id, $code, $nombre, $coordenada;
	public function render() {
		return view(
			'admin.city.index',[
				'cities' => City::get(),
			])->layout('layouts.app',['me'=>$this->me]);
	}
	protected $rules = [
        'code' => 'required',
        'nombre' => 'required',
    ];
	public function create() {
		$this->accion = 'store';
		$this->modal = true;
	}
	public function store() {
		$this->validate();
		City::create([
			'code' => $this->code,
			'nombre' => $this->nombre,
			'coordenada' => $this->coordenada,
		]);
		$this->limpiar();
	}
	public function edit($id) {
		$city = City::find($id);
		$this->modelo_id = $city->id;
		$this->code = $city->code;
		$this->nombre = $city->nombre;
		$this->coordenada = $city->coordenada;

		$this->accion = 'edit';
		$this->modal = true;
	}
	public function update() {
		$city = City::find($this->modelo_id);
		$this->validate();
		$city->update([
			'code' => $this->code,
			'nombre' => $this->nombre,
			'coordenada' => $this->coordenada,
		]);
		$this->limpiar();
	}
	public function select($id) {
		$this->modelo_id = $id;
		$this->delete = true;
	}
	public function destroy() {
		City::destroy($this->modelo_id);
		$this->delete_id = null;
		$this->delete = false;
	}
	public function limpiar() {
		$this->code = '';
		$this->nombre = '';
		$this->coordenada = '';

		$this->modal = false;
		$this->delete = false;
	}
}
