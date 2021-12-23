<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Menu;

class MenuLivewire extends Component
{
	public $modal = false;
	public $delete = false;
	public $accion = 'store';
	public $mensaje = '';
	public $me = 'MMEN';
	public $modelo_id, $code, $label, $icon, $orden, $tamanyo;
	public function render() {
		return view(
			'admin.menu.index',[
				'menus' => Menu::orderBy('orden')->get(),
			])->layout('layouts.app',['me'=>$this->me]);
	}
	protected $rules = [
        'code' => 'required',
        'label' => 'required',
    ];
	public function create() {
		$this->accion = 'store';
		$this->modal = true;
	}
	public function store() {
		$this->validate();
		Menu::create([
			'code' => $this->code,
			'label' => $this->label,
			'icon' => $this->icon,
			'orden' => $this->orden,
			'tamanyo' => $this->tamanyo,
		]);
		$this->limpiar();
		$this->mensaje='Menu creado exitosamente';
	}
	public function edit($id) {
		$menu = Menu::find($id);
		$this->modelo_id = $menu->id;
		$this->code = $menu->code;
		$this->label = $menu->label;
		$this->icon = $menu->icon;
		$this->orden = $menu->orden;
		$this->tamanyo = $menu->tamanyo;

		$this->accion = 'edit';
		$this->modal = true;
	}
	public function update() {
		$menu = Menu::find($this->modelo_id);
		$this->validate();
		$menu->update([
			'code' => $this->code,
			'label' => $this->label,
			'icon' => $this->icon,
			'orden' => $this->orden,
			'tamanyo' => $this->tamanyo,
		]);
		$this->limpiar();
		$this->mensaje='Menu creado exitosamente';
	}
	public function select($id) {
		$this->modelo_id = $id;
		$this->delete = true;
	}
	public function destroy() {
		Menu::destroy($this->modelo_id);
		$this->delete_id = null;
		$this->delete = false;
		$this->mensaje='Menu creado exitosamente';
	}
	public function limpiar() {
		$this->code = '';
		$this->label = '';
		$this->icon = '';
		$this->orden = '';
		$this->tamanyo = '';

		$this->modal = false;
		$this->delete = false;
	}
}
