<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Functionality;
use App\Models\Menu;
use App\Models\Ticket;
use Auth;

class FunctionalityLivewire extends Component
{
	public $modal = false;
	public $delete = false;
	public $accion = 'store';
	public $mensaje = '';
	public $me = 'MFUN';
	public $modelo_id, $code, $label, $path, $mostrar, $menu_id;
	
	public function render() {
		$office_id = Auth::user()->people->office_id;
		return view(
			'admin.functionality.index',[
				'lista' => Functionality::get(),
				'menus' => Menu::get(),
			])->layout('layouts.app',['me'=>$this->me,'tickets' => Ticket::get()]);
	}
	protected $rules = [
        'code' => 'required',
        'label' => 'required',
        'path' => 'required',
        'menu_id' => 'required',
    ];
	public function create() {
		$this->accion = 'store';
		$this->modal = true;
	}
	public function store() {
		$this->validate();
		Functionality::create([
			'code' => $this->code,
			'label' => $this->label,
			'path' => $this->path,
			'mostrar' => $this->mostrar,
			'menu_id' => $this->menu_id,
		]);
		$this->limpiar();
		$this->mensaje='Funcionalidad creada exitosamente';
	}
	public function edit($id) {
		$functionality = Functionality::find($id);
		$this->modelo_id = $functionality->id;
		$this->code = $functionality->code;
		$this->label = $functionality->label;
		$this->path = $functionality->path;
		$this->mostrar = $functionality->mostrar;
		$this->menu_id = $functionality->menu_id;

		$this->accion = 'edit';
		$this->modal = true;
	}
	public function update() {
		$functionality = Functionality::find($this->modelo_id);
		$this->validate();
		$functionality->update([
			'code' => $this->code,
			'label' => $this->label,
			'path' => $this->path,
			'mostrar' => $this->mostrar,
			'menu_id' => $this->menu_id,
		]);
		$this->limpiar();
		$this->mensaje='Funcionalidad editada exitosamente';
	}
	public function select($id) {
		$this->modelo_id = $id;
		$this->delete = true;
	}
	public function destroy() {
		Functionality::destroy($this->modelo_id);
		$this->delete_id = null;
		$this->delete = false;
		$this->mensaje='Funcionalidad eliminada exitosamente';
	}
	public function limpiar() {
		$this->code = null;
		$this->label = null;
		$this->path = null;
		$this->mostrar = null;
		$this->menu_id = null;

		$this->modal = false;
		$this->delete = false;
	}
}
