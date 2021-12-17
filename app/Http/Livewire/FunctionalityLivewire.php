<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Functionality;
use App\Models\Menu;
use Auth;

class FunctionalityLivewire extends Component
{
	public $modal = false;
	public $delete = false;
	public $accion = 'store';
	public $me = 'MFUN';
	public $modelo_id, $code, $label, $path, $mostrar, $menu_id;
	public function render() {
		return view(
			'admin.functionality.index',[
				'lista' => Functionality::get(),
				'menus' => Menu::get(),
			])->layout('layouts.app',['me'=>$this->me]);
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
	}
	public function select($id) {
		$this->modelo_id = $id;
		$this->delete = true;
	}
	public function destroy() {
		Functionality::destroy($this->modelo_id);
		$this->delete_id = null;
		$this->delete = false;
	}
	public function limpiar() {
		$this->code = '';
		$this->label = '';
		$this->path = '';
		$this->mostrar = '';
		$this->menu_id = '';

		$this->modal = false;
		$this->delete = false;
	}
}
