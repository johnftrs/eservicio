<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Office;
use App\Models\User;
use App\Models\Human;
use App\Models\Role;
use App\Models\Location;
use App\Models\City;
use Illuminate\Support\Facades\Hash;

class UserLivewire extends Component
{
	public $modal = false;
	public $delete = false;
	public $accion = 'store';
	public $me = 'MUSE';
	public $modelo_id, $name, $email, $password, $role_id, $ci ,$nombre ,$paterno ,$materno ,$direccion ,$telefono ,$fecha_nacimiento ,$fecha_ingreso ,$nivel_estudio ,$biometrico ,$estado_civil ,$afp ,$foto ,$nombre_garante ,$relacion_garante ,$telefono_garante ,$trabajo_garante ,$direccion_garante ,$nombre_referencia_personal ,$relacion_referencia_personal ,$telefono_referencia_personal ,$trabajo_referencia_personal ,$direccion_referencia_personal ,$location_id ,$city_id ,$office_id;
	public function render() {
		return view(
			'user.index',[
				'users' => User::get(),
				'offices' => Office::get(),
				'peoples' => Human::get(),
				'roles' => Role::get(),
				'cities' => City::get(),
				'locations' => Location::get(),
			])->layout('layouts.app',['me'=>$this->me]);
	}
	protected $rules = [
		'name' => 'required',
		'email' => 'required',
		'password' => 'required',
		'role_id' => 'required',
		'nombre' => 'required',
		'paterno' => 'required',
		'location_id' => 'required',
		'city_id' => 'required',
		'office_id' => 'required',
	];
	public function create() {
		$this->accion = 'store';
		$this->modal = true;
	}
	public function store() {
		$this->validate();
		User::create([
			'name' => $this->name,
			'email' => $this->email,
			'password' => Hash::make($this->password),
			'role_id' => $this->role_id,
		]);
		Human::create([
			'ci' => $this->ci,
			'nombre' => $this->nombre,
			'paterno' => $this->paterno,
			'materno' => $this->materno,
			'direccion' => $this->direccion,
			'telefono' => $this->telefono,
			'fecha_nacimiento' => $this->fecha_nacimiento,
			'fecha_ingreso' => $this->fecha_ingreso,
			'nivel_estudio' => $this->nivel_estudio,
			'biometrico' => $this->biometrico,
			'estado_civil' => $this->estado_civil,
			'afp' => $this->afp,
			'foto' => $this->foto,
			'nombre_garante' => $this->nombre_garante,
			'relacion_garante' => $this->relacion_garante,
			'telefono_garante' => $this->telefono_garante,
			'trabajo_garante' => $this->trabajo_garante,
			'direccion_garante' => $this->direccion_garante,
			'nombre_referencia_personal' => $this->nombre_referencia_personal,
			'relacion_referencia_personal' => $this->relacion_referencia_personal,
			'telefono_referencia_personal' => $this->telefono_referencia_personal,
			'trabajo_referencia_personal' => $this->trabajo_referencia_personal,
			'direccion_referencia_personal' => $this->direccion_referencia_personal,
			'location_id' => $this->location_id,
			'city_id' => $this->city_id,
			'office_id' => $this->office_id,
		]);
		$this->limpiar();
	}
	public function edit($id) {
		$user = User::find($id);
		$human = Human::find($id);
		$this->modelo_id = $user->id;
		$this->name = $user->name;
		$this->email = $user->email;
		$this->password = '';
		$this->role_id = $user->role_id;

		$this->ci = $human->ci;
		$this->nombre = $human->nombre;
		$this->paterno = $human->paterno;
		$this->materno = $human->materno;
		$this->direccion = $human->direccion;
		$this->telefono = $human->telefono;
		$this->fecha_nacimiento = $human->fecha_nacimiento;
		$this->fecha_ingreso = $human->fecha_ingreso;
		$this->nivel_estudio = $human->nivel_estudio;
		$this->biometrico = $human->biometrico;
		$this->estado_civil = $human->estado_civil;
		$this->afp = $human->afp;
		$this->foto = $human->foto;
		$this->nombre_garante = $human->nombre_garante;
		$this->relacion_garante = $human->relacion_garante;
		$this->telefono_garante = $human->telefono_garante;
		$this->trabajo_garante = $human->trabajo_garante;
		$this->direccion_garante = $human->direccion_garante;
		$this->nombre_referencia_personal = $human->nombre_referencia_personal;
		$this->relacion_referencia_personal = $human->relacion_referencia_personal;
		$this->telefono_referencia_personal = $human->telefono_referencia_personal;
		$this->trabajo_referencia_personal = $human->trabajo_referencia_personal;
		$this->direccion_referencia_personal = $human->direccion_referencia_personal;
		$this->location_id = $human->location_id;
		$this->city_id = $human->city_id;
		$this->office_id = $human->office_id;

		$this->accion = 'edit';
		$this->modal = true;
	}
	public function update() {
		$user = User::find($this->modelo_id);
		$human = Human::find($this->modelo_id);
		$this->validate();
		$user->update([
			'name' => $this->name,
			'email' => $this->email,
			'password' => Hash::make($this->password),
			'role_id' => $this->role_id,
		]);
		$human->update([
			'ci' => $this->ci,
			'nombre' => $this->nombre,
			'paterno' => $this->paterno,
			'materno' => $this->materno,
			'direccion' => $this->direccion,
			'telefono' => $this->telefono,
			'fecha_nacimiento' => $this->fecha_nacimiento,
			'fecha_ingreso' => $this->fecha_ingreso,
			'nivel_estudio' => $this->nivel_estudio,
			'biometrico' => $this->biometrico,
			'estado_civil' => $this->estado_civil,
			'afp' => $this->afp,
			'foto' => $this->foto,
			'nombre_garante' => $this->nombre_garante,
			'relacion_garante' => $this->relacion_garante,
			'telefono_garante' => $this->telefono_garante,
			'trabajo_garante' => $this->trabajo_garante,
			'direccion_garante' => $this->direccion_garante,
			'nombre_referencia_personal' => $this->nombre_referencia_personal,
			'relacion_referencia_personal' => $this->relacion_referencia_personal,
			'telefono_referencia_personal' => $this->telefono_referencia_personal,
			'trabajo_referencia_personal' => $this->trabajo_referencia_personal,
			'direccion_referencia_personal' => $this->direccion_referencia_personal,
			'location_id' => $this->location_id,
			'city_id' => $this->city_id,
			'office_id' => $this->office_id,
		]);
		$this->limpiar();
	}
	public function select($id) {
		$this->modelo_id = $id;
		$this->delete = true;
	}
	public function destroy() {
		User::destroy($this->modelo_id);
		$this->delete_id = null;
		$this->delete = false;
	}
	public function limpiar() {
		$this->name = '';
		$this->email = '';
		$this->password = '';
		$this->role_id = '';
		$this->ci = '';
		$this->nombre = '';
		$this->paterno = '';
		$this->materno = '';
		$this->direccion = '';
		$this->telefono = '';
		$this->fecha_nacimiento = '';
		$this->fecha_ingreso = '';
		$this->nivel_estudio = '';
		$this->biometrico = '';
		$this->estado_civil = '';
		$this->afp = '';
		$this->foto = '';
		$this->nombre_garante = '';
		$this->relacion_garante = '';
		$this->telefono_garante = '';
		$this->trabajo_garante = '';
		$this->direccion_garante = '';
		$this->nombre_referencia_personal = '';
		$this->relacion_referencia_personal = '';
		$this->telefono_referencia_personal = '';
		$this->trabajo_referencia_personal = '';
		$this->direccion_referencia_personal = '';
		$this->location_id = '';
		$this->city_id = '';
		$this->office_id = '';

		$this->modal = false;
		$this->delete = false;
	}
}
