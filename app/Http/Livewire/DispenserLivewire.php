<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Dispenser;
use App\Models\Office;
use App\Models\Hosepipe;
use App\Models\Fuel;
use App\Models\Tank;
use Auth;

class DispenserLivewire extends Component
{
	public $modal = false;
	public $delete = false;
	public $page = false;
	public $accion = 'store';
	public $mensaje = '';
	public $clase = 'dispenser';
	public $me = 'MDIS';
	public $modelo_id, $nombre, $office_id;
	public $h_modelo_id, $h_nombre, /*$h_fuel_id,*/ $h_tank_id, $h_dispenser_id;
	public function render() {
		return view(
			'admin.dispenser.index',[
				'dispensers' => Dispenser::orderBy('nombre','asc')->get(),
				'offices' => Office::get(),
				'hosepipes' => Hosepipe::get(),
				'fuels' => Fuel::get(),
				'tanks' => Tank::get(),
			])->layout('layouts.app',['me'=>$this->me]);
	}
	public function create() {
		$this->accion = 'store';
		$this->clase = 'dispenser';
		$this->modal = true;
	}
	public function store() {
		$this->validate([
			'nombre' => 'required',
			'office_id' => 'required',
		]);
		Dispenser::create([
			'nombre' => $this->nombre,
			'office_id' => $this->office_id,
		]);
		$this->limpiar();
		$this->mensaje='Dispenser creado exitosamente';
	}
	public function edit($id) {
		$dispenser = Dispenser::find($id);
		$this->modelo_id = $dispenser->id;
		$this->nombre = $dispenser->nombre;
		$this->office_id = $dispenser->office_id;

		$this->accion = 'edit';
		$this->clase = 'dispenser';
		$this->modal = true;
	}
	public function update() {
		$dispenser = Dispenser::find($this->modelo_id);
		$this->validate([
			'nombre' => 'required',
			'office_id' => 'required',
		]);
		$dispenser->update([
			'nombre' => $this->nombre,
			'office_id' => $this->office_id,
		]);
		$this->limpiar();
		$this->mensaje='Dispenser editado exitosamente';
	}
	public function select($id) {
		$this->modelo_id = $id;
		$this->clase = 'dispenser';
		$this->delete = true;
	}
	public function destroy() {
		Dispenser::destroy($this->modelo_id);
		$this->delete_id = null;
		$this->delete = false;
		$this->mensaje='Dispenser eliminado exitosamente';
	}
	public function limpiar() {
		$this->nombre = '';
		$this->office_id = '';
		$this->h_nombre = '';
		/*$this->h_fuel_id = '';*/
		$this->h_tank_id = '';
		$this->h_dispenser_id = '';

		$this->modal = false;
		$this->delete = false;
	}
	public function mangueras($id) {
		$this->modelo_id = $id;
		$this->page = true;
	}
	public function h_create() {
		$this->accion = 'store';
		$this->clase = 'hosepipe';
		$this->modal = true;
	}
	public function h_store() {
		$this->validate([
			'h_nombre' =>'required',
			/*'h_fuel_id' =>'required',*/
			'h_tank_id' =>'required',
		]);
		Hosepipe::create([
			'nombre' => $this->h_nombre,
			/*'fuel_id' => $this->h_fuel_id,*/
			'tank_id' => $this->h_tank_id,
			'dispenser_id' => $this->modelo_id,
		]);
		$this->limpiar();
		$this->mensaje='Manguera creada exitosamente';
	}
	public function h_edit($id) {
		$dispenser = Hosepipe::find($id);
		$this->h_modelo_id = $dispenser->id;
		$this->h_nombre = $dispenser->nombre;
		/*$this->h_fuel_id = $dispenser->fuel_id;*/
		$this->h_tank_id = $dispenser->tank_id;

		$this->accion = 'edit';
		$this->clase = 'hosepipe';
		$this->modal = true;
	}
	public function h_update() {
		$this->validate([
			'h_nombre' =>'required',
			/*'h_fuel_id' =>'required',*/
			'h_tank_id' =>'required',
		]);
		$dispenser = Hosepipe::find($this->h_modelo_id);
		$dispenser->update([
			'nombre' => $this->h_nombre,
			/*'fuel_id' => $this->h_fuel_id,*/
			'tank_id' => $this->h_tank_id,
		]);
		$this->limpiar();
		$this->mensaje='Manguera editada exitosamente';
	}
	public function h_select($id) {
		$this->h_modelo_id = $id;
		$this->clase = 'hosepipe';
		$this->delete = true;
	}
	public function h_destroy() {
		Hosepipe::destroy($this->h_modelo_id);
		$this->delete = false;
		$this->mensaje='Manguera eliminada exitosamente';
	}
}
