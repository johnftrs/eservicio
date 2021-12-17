<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Dispenser;
use App\Models\Office;
use Auth;

class DispenserLivewire extends Component
{
	public $modal = false;
	public $delete = false;
	public $accion = 'store';
	public $me = 'MDIS';
	public $modelo_id, $nombre, $office_id;
	public function render() {
		return view(
			'admin.dispenser.index',[
				'dispensers' => Dispenser::orderBy('nombre','asc')->get(),
				'offices' => Office::get(),
			])->layout('layouts.app',['me'=>$this->me]);
	}
	protected $rules = [
        'nombre' => 'required',
        'office_id' => 'required',
    ];
	public function create() {
		$this->accion = 'store';
		$this->modal = true;
	}
	public function store() {
		$this->validate();
		Dispenser::create([
			'nombre' => $this->nombre,
			'office_id' => $this->office_id,
		]);
		$this->limpiar();
	}
	public function edit($id) {
		$dispenser = Dispenser::find($id);
		$this->modelo_id = $dispenser->id;
		$this->nombre = $dispenser->nombre;
		$this->office_id = $dispenser->office_id;

		$this->accion = 'edit';
		$this->modal = true;
	}
	public function update() {
		$dispenser = Dispenser::find($this->modelo_id);
		$this->validate();
		$dispenser->update([
			'nombre' => $this->nombre,
			'office_id' => $this->office_id,
		]);
		$this->limpiar();
	}
	public function select($id) {
		$this->modelo_id = $id;
		$this->delete = true;
	}
	public function destroy() {
		Dispenser::destroy($this->modelo_id);
		$this->delete_id = null;
		$this->delete = false;
	}
	public function limpiar() {
		$this->nombre = '';
		$this->office_id = '';

		$this->modal = false;
		$this->delete = false;
	}
}
