<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Fuel;
use App\Models\Tank;
use Auth;

class FuelLivewire extends Component
{
	public $modal = false;
	public $delete = false;
	public $page = false;
	public $accion = 'store';
	public $mensaje = '';
	public $clase = 'fuel';
	public $me = 'MFUE';
	public $modelo_id, $nombre, $precio, $unidad;
	public $h_modelo_id, $h_nombre, $h_total, $h_actual;
	public function render() {
		return view(
			'admin.fuel.index',[
				'fuels' => Fuel::get(),
				'tanks' => Tank::get(),
			])->layout('layouts.app',['me'=>$this->me]);
	}
	public function create() {
		$this->accion = 'store';
		$this->clase = 'fuel';
		$this->modal = true;
	}
	public function store() {
		$this->validate([
			'nombre' => 'required',
			'precio' => 'required',
		]);
		Fuel::create([
			'nombre' => $this->nombre,
			'precio' => $this->precio,
			'unidad' => $this->unidad,
		]);
		$this->limpiar();
		$this->mensaje='Combustible creado exitosamente';
	}
	public function edit($id) {
		$fuel = Fuel::find($id);
		$this->modelo_id = $fuel->id;
		$this->nombre = $fuel->nombre;
		$this->precio = number_format($fuel->precio, 2, '.', '');
		$this->unidad = $fuel->unidad;

		$this->accion = 'edit';
		$this->clase = 'fuel';
		$this->modal = true;
	}
	public function update() {
		$fuel = Fuel::find($this->modelo_id);
		$this->validate([
			'nombre' => 'required',
			'precio' => 'required',
		]);
		$fuel->update([
			'nombre' => $this->nombre,
			'precio' => $this->precio,
			'unidad' => $this->unidad,
		]);
		$this->limpiar();
		$this->mensaje='Combustible editado exitosamente';
	}
	public function select($id) {
		$this->modelo_id = $id;
		$this->clase = 'fuel';
		$this->delete = true;
	}
	public function destroy() {
		Fuel::destroy($this->modelo_id);
		$this->delete_id = null;
		$this->delete = false;
		$this->mensaje='Combustible eliminado exitosamente';
	}
	public function limpiar() {
		$this->nombre = '';
		$this->precio = '';
		$this->unidad = '';
		$this->h_nombre = '';
		$this->h_total = '';
		$this->h_actual = '';

		$this->modal = false;
		$this->delete = false;
	}
	public function tanques($id) {
		$this->modelo_id = $id;
		$this->page = true;
	}
	public function h_create() {
		$this->accion = 'store';
		$this->clase = 'tank';
		$this->modal = true;
	}
	public function h_store() {
		$this->validate([
			'h_nombre' =>'required',
		]);
		Tank::create([
			'nombre' => $this->h_nombre,
			'total' => $this->h_total,
			'actual' => $this->h_actual,
			'fuel_id' => $this->modelo_id,
		]);
		$this->limpiar();
		$this->mensaje='Tanque creado exitosamente';
	}
	public function h_edit($id) {
		$fuel = Tank::find($id);
		$this->h_modelo_id = $fuel->id;
		$this->h_nombre = $fuel->nombre;
		$this->h_total = $fuel->total;
		$this->h_actual = $fuel->actual;

		$this->accion = 'edit';
		$this->clase = 'tank';
		$this->modal = true;
	}
	public function h_update() {
		$this->validate([
			'h_nombre' =>'required',
		]);
		$fuel = Tank::find($this->h_modelo_id);
		$fuel->update([
			'nombre' => $this->h_nombre,
			'total' => $this->h_total,
			'actual' => $this->h_actual,
		]);
		$this->limpiar();
		$this->mensaje='Tanque editado exitosamente';
	}
	public function h_select($id) {
		$this->h_modelo_id = $id;
		$this->clase = 'tank';
		$this->delete = true;
	}
	public function h_destroy() {
		Tank::destroy($this->h_modelo_id);
		$this->delete = false;
		$this->mensaje='Tanque eliminado exitosamente';
	}
}
