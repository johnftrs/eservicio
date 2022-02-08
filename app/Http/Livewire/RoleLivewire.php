<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Role;
use App\Models\Menu;
use App\Models\Functionality;
use App\Models\Privilege;
use App\Models\Ticket;
use Auth;

class RoleLivewire extends Component
{
	public $modal = false;
	public $delete = false;
	public $accion = 'store';
	public $mensaje = '';
	public $funciones;
	public $me = 'MROL';
	public $modelo_id, $code, $name;
	
	public function render() {
		$office_id = Auth::user()->people->office_id;
		return view(
			'admin.role.index',[
				'functionalities' => Functionality::where('menu_id','!=',3)->where('menu_id','!=',4)->get()->unique('menu_id'),
				'roles' => (Auth::user()->role_id == 1) ? Role::get() : Role::where('id','>',1)->get(),
				'menus' => Menu::get(),
			])->layout('layouts.app',['me'=>$this->me,'tickets' => Ticket::get()]);
	}
	public function create() {
		$this->accion = 'store';
		$this->modal = true;
	}
	public function store() {
		$this->validate([
			'code' => 'required|unique:roles',
		]);
		$role = Role::create([
			'code' => $this->code,
			'name' => $this->name,
		]);
		if ($this->funciones!=null) {
			foreach ($this->funciones as $key => $function) {
				if ($function) {
					Privilege::create([
						'functionality_id' => $function,
						'role_id' => $role->id,
					]);
				}
			}
		}
		$this->limpiar();
		$this->mensaje='Rol creado exitosamente';
	}
	public function edit($id) {
		$role = Role::find($id);
		foreach (Privilege::where('role_id',$id)->get() as $key => $privilege) {
			$this->funciones[$privilege->functionality_id] = $privilege->functionality_id;
		}
		$this->modelo_id = $role->id;
		$this->code = $role->code;
		$this->name = $role->name;
		$this->accion = 'edit';
		$this->modal = true;
	}
	public function update() {
		$role = Role::find($this->modelo_id);
		$this->validate([
			'code' => 'required',
		]);
		$role->update([
			'code' => $this->code,
			'name' => $this->name,
		]);
		$role->functionalities()->detach();
		foreach ($this->funciones as $key => $function) {
			if ($function) {
				Privilege::create([
					'functionality_id' => $function,
					'role_id' => $role->id,
				]);
			}
		}
		$this->limpiar();
		$this->mensaje='Rol editado exitosamente';
	}
	public function select($id) {
		$this->modelo_id = $id;
		$this->delete = true;
	}
	public function destroy() {
		Role::destroy($this->modelo_id);
		$this->delete_id = null;
		$this->delete = false;
		$this->mensaje='Rol eliminado exitosamente';
	}
	public function limpiar() {
		$this->code = null;
		$this->name = null;
		$this->funciones = null;

		$this->modal = false;
		$this->delete = false;
	}
}
