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
	public $modelo_id, $nombre, $meter, $tank_id;
	public $h_modelo_id, $h_nombre, $h_tank_id, $h_dispenser_id;
	public function render() {
		return view(
			'admin.dispenser.index',[
				'dispensers' => Dispenser::where('office_id',Auth::user()->people->office_id)->orderBy('nombre','asc')->get(),
				'hosepipes' => Hosepipe::get(),
				'tanks' => Tank::where('office_id',Auth::user()->people->office_id)->get(),
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
			'tank_id' => 'required',
		]);
		$tank = Tank::find($this->tank_id);
		Dispenser::create([
			'nombre' => $this->nombre,
			'meter' => $this->meter,
			'tank_id' => $this->tank_id,
			'fuel_id' => $tank->fuel_id,
			'office_id' => Auth::user()->people->office_id,
		]);
		$this->limpiar();
		$this->mensaje='Dispenser creado exitosamente';
	}
	public function edit($id) {
		$dispenser = Dispenser::find($id);
		$this->modelo_id = $dispenser->id;
		$this->nombre = $dispenser->nombre;
		$this->meter = $dispenser->meter;
		$this->tank_id = $dispenser->tank_id;

		$this->accion = 'edit';
		$this->clase = 'dispenser';
		$this->modal = true;
	}
	public function update() {
		$dispenser = Dispenser::find($this->modelo_id);
		$this->validate([
			'nombre' => 'required',
			'tank_id' => 'required',
		]);
		$tank = Tank::find($this->tank_id);
		$dispenser->update([
			'nombre' => $this->nombre,
			'meter' => $this->meter,
			'tank_id' => $this->tank_id,
			'fuel_id' => $tank->fuel_id,
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
		$this->meter = '';
		$this->tank_id = '';
		$this->h_nombre = '';
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
			'h_tank_id' =>'required',
		]);
		Hosepipe::create([
			'nombre' => $this->h_nombre,
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
		$this->h_tank_id = $dispenser->tank_id;

		$this->accion = 'edit';
		$this->clase = 'hosepipe';
		$this->modal = true;
	}
	public function h_update() {
		$this->validate([
			'h_nombre' =>'required',
			'h_tank_id' =>'required',
		]);
		$dispenser = Hosepipe::find($this->h_modelo_id);
		$dispenser->update([
			'nombre' => $this->h_nombre,
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
