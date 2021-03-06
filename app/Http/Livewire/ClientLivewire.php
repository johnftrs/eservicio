<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Client;
use App\Models\Office;
use App\Models\Driver;
use App\Models\Vehicle;
use App\Models\Ticket;
use Auth;

class ClientLivewire extends Component
{
	public $modal = false;
	public $delete = false;
	public $page = false;
	public $accion = 'store';
	public $mensaje = '';
	public $clase = 'client';
	public $me = 'MCLI';
	public $modelo_id, $nombre, $nit, $correo, $direccion, $telefono, $telefono2, $estado='Activo', $representante_legal, $representante_ci, $representante_telefono, $representante_telefono2, $representante_email, $representante_detalles;
	public $d_modelo_id, $d_ci, $d_nombre, $d_paterno, $d_materno, $d_licencia, $d_estado='Activo';
	public $v_modelo_id, $v_placa, $v_marca, $v_modelo, $v_anyo, $v_color, $v_estado='Activo';
	
	public function render() {
		$office_id = Auth::user()->people->office_id;
		return view(
			'admin.client.index',[
				'clients' => Client::where('office_id',$office_id)->orderBy('nombre','asc')->get(),
				'drivers' => Driver::get(),
				'vehicles' => Vehicle::get(),
			])->layout('layouts.app',['me'=>$this->me,'tickets' => Ticket::get()]);
	}
	public function create() {
		$this->accion = 'store';
		$this->clase = 'client';
		$this->modal = true;
	}
	public function store() {
		$this->validate([
			'nombre' =>'required',
			'estado' =>'required',
		]);
		Client::create([
			'nombre' => $this->nombre,
			'nit' => $this->nit,
			'correo' => $this->correo,
			'direccion' => $this->direccion,
			'telefono' => $this->telefono,
			'telefono2' => $this->telefono2,
			'estado' => $this->estado,
			'representante_legal' => $this->representante_legal,
			'representante_ci' => $this->representante_ci,
			'representante_telefono' => $this->representante_telefono,
			'representante_telefono2' => $this->representante_telefono2,
			'representante_email' => $this->representante_email,
			'representante_detalles' => $this->representante_detalles,
			'office_id' => Auth::user()->people->office_id,
			'user_id' => Auth::id(),
		]);
		$this->limpiar();
		$this->mensaje='Cliente editado exitosamente';
	}
	public function edit($id) {
		$client = Client::find($id);
		$this->modelo_id = $client->id;
		$this->nombre = $client->nombre;
		$this->nit = $client->nit;
		$this->correo = $client->correo;
		$this->direccion = $client->direccion;
		$this->telefono = $client->telefono;
		$this->telefono2 = $client->telefono2;
		$this->estado = $client->estado;
		$this->representante_legal = $client->representante_legal;
		$this->representante_ci = $client->representante_ci;
		$this->representante_telefono = $client->representante_telefono;
		$this->representante_telefono2 = $client->representante_telefono2;
		$this->representante_email = $client->representante_email;
		$this->representante_detalles = $client->representante_detalles;

		$this->accion = 'edit';
		$this->clase = 'client';
		$this->modal = true;
	}
	public function update() {
		$client = Client::find($this->modelo_id);
		$this->validate([
			'nombre' =>'required',
			'estado' =>'required',
		]);
		$client->update([
			'nombre' => $this->nombre,
			'nit' => $this->nit,
			'correo' => $this->correo,
			'direccion' => $this->direccion,
			'telefono' => $this->telefono,
			'telefono2' => $this->telefono2,
			'estado' => $this->estado,
			'representante_legal' => $this->representante_legal,
			'representante_ci' => $this->representante_ci,
			'representante_telefono' => $this->representante_telefono,
			'representante_telefono2' => $this->representante_telefono2,
			'representante_email' => $this->representante_email,
			'representante_detalles' => $this->representante_detalles,
			'office_id' => Auth::user()->people->office_id,
			'user_id' => Auth::id(),
		]);
		$this->limpiar();
		$this->mensaje='Cliente editado exitosamente';
	}
	public function select($id) {
		$this->modelo_id = $id;
		$this->clase = 'client';
		$this->delete = true;
	}
	public function destroy() {
		Client::destroy($this->modelo_id);
		$this->delete = false;
		$this->mensaje='Cliente eliminado exitosamente';
	}
	public function limpiar() {
		$this->nombre = null;
		$this->nit = null;
		$this->correo = null;
		$this->direccion = null;
		$this->telefono = null;
		$this->telefono2 = null;
		$this->estado = null;
		$this->representante_legal = null;
		$this->representante_ci = null;
		$this->representante_telefono = null;
		$this->representante_telefono2 = null;
		$this->representante_email = null;
		$this->representante_detalles = null;
		$this->d_ci = null;
		$this->d_nombre = null;
		$this->d_paterno = null;
		$this->d_materno = null;
		$this->d_licencia = null;
		$this->d_estado = null;
		$this->v_placa = null;
		$this->v_marca = null;
		$this->v_modelo = null;
		$this->v_anyo = null;
		$this->v_color = null;
		$this->v_estado = null;

		$this->modal = false;
		$this->delete = false;
	}
	public function kardex($id) {
		$this->modelo_id = $id;
		
		$this->page = true;
	}
	public function d_create() {
		$this->accion = 'store';
		$this->clase = 'driver';
		$this->modal = true;
	}
	public function d_store() {
		$this->validate([
			'd_nombre' =>'required',
			'd_estado' =>'required',
		]);
		Driver::create([
			'ci' => $this->d_ci,
			'nombre' => $this->d_nombre,
			'paterno' => $this->d_paterno,
			'materno' => $this->d_materno,
			'licencia' => $this->d_licencia,
			'estado' => $this->d_estado,
			'client_id' => $this->modelo_id,
		]);
		$this->limpiar();
		$this->mensaje='Chofer creado exitosamente';
	}
	public function d_edit($id) {
		$driver = Driver::find($id);
		$this->d_modelo_id = $driver->id;
		$this->d_ci = $driver->ci;
		$this->d_nombre = $driver->nombre;
		$this->d_paterno = $driver->paterno;
		$this->d_materno = $driver->materno;
		$this->d_licencia = $driver->licencia;
		$this->d_estado = $driver->estado;

		$this->accion = 'edit';
		$this->clase = 'driver';
		$this->modal = true;
	}
	public function d_update() {
		$this->validate([
			'd_nombre' =>'required',
			'd_estado' =>'required',
		]);
		$driver = Driver::find($this->d_modelo_id);
		$driver->update([
			'ci' => $this->d_ci,
			'nombre' => $this->d_nombre,
			'paterno' => $this->d_paterno,
			'materno' => $this->d_materno,
			'licencia' => $this->d_licencia,
			'estado' => $this->d_estado,
		]);
		$this->limpiar();
		$this->mensaje='Chofer editado exitosamente';
	}
	public function d_select($id) {
		$this->d_modelo_id = $id;
		$this->clase = 'driver';
		$this->delete = true;
	}
	public function d_destroy() {
		Driver::destroy($this->d_modelo_id);
		$this->delete = false;
		$this->mensaje='Chofer eliminado exitosamente';
	}
	public function v_create() {
		$this->accion = 'store';
		$this->clase = 'vehicle';
		$this->modal = true;
	}
	public function v_store() {
		$this->validate([
			'v_placa' =>'required',
			'v_estado' =>'required',
		]);
		Vehicle::create([
			'placa' => $this->v_placa,
			'marca' => $this->v_marca,
			'modelo' => $this->v_modelo,
			'anyo' => $this->v_anyo,
			'color' => $this->v_color,
			'estado' => $this->v_estado,
			'client_id' => $this->modelo_id,
		]);
		$this->limpiar();
		$this->mensaje='Veh??culo creado exitosamente';
	}
	public function v_edit($id) {
		$vehicle = Vehicle::find($id);
		$this->v_modelo_id = $vehicle->id;
		$this->v_placa = $vehicle->placa;
		$this->v_marca = $vehicle->marca;
		$this->v_modelo = $vehicle->modelo;
		$this->v_anyo = $vehicle->anyo;
		$this->v_color = $vehicle->color;
		$this->v_estado = $vehicle->estado;

		$this->accion = 'edit';
		$this->clase = 'vehicle';
		$this->modal = true;
	}
	public function v_update() {
		$this->validate([
			'v_placa' =>'required',
			'v_estado' =>'required',
		]);
		$vehicle = Vehicle::find($this->v_modelo_id);
		$vehicle->update([
			'placa' => $this->v_placa,
			'marca' => $this->v_marca,
			'modelo' => $this->v_modelo,
			'anyo' => $this->v_anyo,
			'color' => $this->v_color,
			'estado' => $this->v_estado,
		]);
		$this->limpiar();
		$this->mensaje='Veh??culo eliminado exitosamente';
	}
	public function v_select($id) {
		$this->v_modelo_id = $id;
		$this->clase = 'vehicle';
		$this->delete = true;
	}
	public function v_destroy() {
		Vehicle::destroy($this->v_modelo_id);
		$this->delete = false;
		$this->mensaje='Veh??culo eliminado exitosamente';
	}
}
