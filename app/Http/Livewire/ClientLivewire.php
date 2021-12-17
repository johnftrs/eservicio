<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Client;
use App\Models\City;
use App\Models\Location;
use App\Models\Office;
use App\Models\Driver;
use App\Models\Vehicle;
use Auth;

class ClientLivewire extends Component
{
	public $modal = false;
	public $delete = false;
	public $page = false;
	public $accion = 'store';
	public $clase = 'client';
	public $me = 'MCLI';
	public $modelo_id, $nombre, $nit, $correo, $direccion, $telefono, $telefono2, $estado, $representante_legal, $representante_ci, $representante_telefono, $representante_telefono2, $representante_email, $representante_detalles;
	public $d_modelo_id, $d_ci, $d_nombre, $d_paterno, $d_materno, $d_licencia, $d_estado;
	public $v_modelo_id, $v_placa, $v_marca, $v_modelo, $v_anyo, $v_color, $v_estado;
	public function render() {
		return view(
			'admin.client.index',[
				'clients' => Client::orderBy('nombre','asc')->get(),
				'cities' => City::get(),
				'locations' => Location::get(),
				'offices' => Office::get(),
				'drivers' => Driver::get(),
				'vehicles' => Vehicle::get(),
			])->layout('layouts.app',['me'=>$this->me]);
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
			'city_id' => Auth::user()->people->city_id,
			'location_id' => Auth::user()->people->location_id,
			'office_id' => Auth::user()->people->office_id,
			'user_id' => Auth::id(),
		]);
		$this->limpiar();
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
			'city_id' => Auth::user()->people->city_id,
			'location_id' => Auth::user()->people->location_id,
			'office_id' => Auth::user()->people->office_id,
			'user_id' => Auth::id(),
		]);
		$this->limpiar();
	}
	public function select($id) {
		$this->modelo_id = $id;
		$this->clase = 'client';
		$this->delete = true;
	}
	public function destroy() {
		Client::destroy($this->modelo_id);
		$this->delete = false;
	}
	public function limpiar() {
		$this->nombre = '';
		$this->nit = '';
		$this->correo = '';
		$this->direccion = '';
		$this->telefono = '';
		$this->telefono2 = '';
		$this->estado = '';
		$this->representante_legal = '';
		$this->representante_ci = '';
		$this->representante_telefono = '';
		$this->representante_telefono2 = '';
		$this->representante_email = '';
		$this->representante_detalles = '';
		$this->d_ci = '';
		$this->d_nombre = '';
		$this->d_paterno = '';
		$this->d_materno = '';
		$this->d_licencia = '';
		$this->d_estado = '';
		$this->v_placa = '';
		$this->v_marca = '';
		$this->v_modelo = '';
		$this->v_anyo = '';
		$this->v_color = '';
		$this->v_estado = '';

		$this->modal = false;
		$this->delete = false;
	}
	public function openPage($id) {
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
	}
	public function d_select($id) {
		$this->d_modelo_id = $id;
		$this->clase = 'driver';
		$this->delete = true;
	}
	public function d_destroy() {
		Driver::destroy($this->d_modelo_id);
		$this->delete = false;
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
	}
	public function v_select($id) {
		$this->v_modelo_id = $id;
		$this->clase = 'vehicle';
		$this->delete = true;
	}
	public function v_destroy() {
		Vehicle::destroy($this->v_modelo_id);
		$this->delete = false;
	}
}
