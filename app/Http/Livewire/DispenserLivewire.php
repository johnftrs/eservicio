<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Dispenser;
use App\Models\Office;
use App\Models\Fuel;
use App\Models\Tank;
use App\Models\Ticket;
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
		$office_id = Auth::user()->people->office_id;
		return view(
			'admin.dispenser.index',[
				'dispensers' => Dispenser::where('office_id',$office_id)->orderBy('nombre','asc')->get(),
				'tanks' => Tank::where('office_id',$office_id)->get(),
			])->layout('layouts.app',['me'=>$this->me,'tickets' => Ticket::get()]);
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
		$this->nombre = null;
		$this->meter = null;
		$this->tank_id = null;
		$this->h_nombre = null;
		$this->h_tank_id = null;
		$this->h_dispenser_id = null;

		$this->modal = false;
		$this->delete = false;
	}
}
