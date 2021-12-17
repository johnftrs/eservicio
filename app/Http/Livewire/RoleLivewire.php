<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Role;
use App\Models\Menu;
use App\Models\Functionality;

class RoleLivewire extends Component
{
	public $modal = false;
	public $delete = false;
	public $accion = 'store';
	public $funciones;
	public $me = 'MROL';
	public $modelo_id, $code, $name;
	public function render() {
		return view(
			'admin.role.index',[
				'functionalities' => Functionality::get(),
				'roles' => Role::get(),
				'menus' => Menu::get(),
			])->layout('layouts.app',['me'=>$this->me]);
	}
	protected $rules = [
        'code' => 'required',
        'name' => 'required',
    ];
	public function create() {
		$this->accion = 'store';
		$this->modal = true;
	}
	public function store() {
		$this->validate();
		Role::create([
			'code' => $this->code,
			'name' => $this->name,
		]);
		$this->limpiar();
	}
	public function edit($id) {
		$role = Role::find($id);
		$this->modelo_id = $role->id;
		$this->code = $role->code;
		$this->name = $role->name;

		$this->accion = 'edit';
		$this->modal = true;
	}
	public function update() {
		$role = Role::find($this->modelo_id);
		$this->validate();
		$role->update([
			'code' => $this->code,
			'name' => $this->name,
		]);
		$this->limpiar();
	}
	public function select($id) {
		$this->modelo_id = $id;
		$this->delete = true;
	}
	public function destroy() {
		Role::destroy($this->modelo_id);
		$this->delete_id = null;
		$this->delete = false;
	}
	public function limpiar() {
		$this->code = '';
		$this->name = '';

		$this->modal = false;
		$this->delete = false;
	}
}
