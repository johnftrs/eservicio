<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Office;
use App\Models\User;
use App\Models\Human;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use Auth;
use PDF;

class UserLivewire extends Component
{
	use WithFileUploads;
	public $modal = array('active'=>false,'title'=>'','accion'=>'store','url_pdf'=>'');
	public $delete = false;
	public $mensaje = '';
	public $me = 'MUSE';
	public $modelo_id, $name, $email, $password, $role_id, $nombre_completo, $ci, $fecha_nacimiento, $direccion, $zona, $telefono, $telefono2, $nivel_estudio, $estado_civil, $hijos, $ex_empresa, $ex_cargo, $ex_tiempo, $ex_jefe, $ex_renuncia, $ex_observaciones, $fecha_ingreso, $fecha_retiro, $casillero, $siges, $biometrico, $softcontrol, $cuenta_bmsc, $afp, $foto, $nombre_garante, $relacion_garante, $telefono_garante, $trabajo_garante, $direccion_garante, $nombre_referencia_personal, $relacion_referencia_personal, $telefono_referencia_personal, $trabajo_referencia_personal, $direccion_referencia_personal;
	public function render() {
		return view(
			'user.index',[
				'users' => User::where('role_id','>',1)->get(),
				'peoples' => Human::get(),
				'roles' => Role::where('id','>',1)->get(),
			])->layout('layouts.app',['me'=>$this->me]);
	}
	public function create() {
		$this->modal['accion'] = 'store';
		$this->modal['active'] = true;
		$this->modal['title'] = 'Registro de Usuarios';
	}
	public function store() {
		$this->validate([
			'name' => 'required',
			'password' => 'required',
			'role_id' => 'required',
			'foto' => 'image|max:15360',
		]);
		$user = User::create([
			'name' => $this->name,
			'email' => $this->email,
			'password' => Hash::make($this->password),
			'role_id' => $this->role_id,
		]);
		$path = null;
		if ($this->foto != null) {
			$this->foto->storeAs('public/photos', 'user_'.$user->id.'.JPG');
			$path = 'storage/photos/user_'.$user->id.'.JPG';
		}
		Human::create([
			'id' => $user->id,
			'password' => $this->password,
			'nombre_completo' => $this->nombre_completo,
			'ci' => $this->ci,
			'fecha_nacimiento' => $this->fecha_nacimiento,
			'direccion' => $this->direccion,
			'zona' => $this->zona,
			'telefono' => $this->telefono,
			'telefono2' => $this->telefono2,
			'nivel_estudio' => $this->nivel_estudio,
			'estado_civil' => $this->estado_civil,
			'hijos' => $this->hijos,
			'ex_empresa' => $this->ex_empresa,
			'ex_cargo' => $this->ex_cargo,
			'ex_tiempo' => $this->ex_tiempo,
			'ex_jefe' => $this->ex_jefe,
			'ex_renuncia' => $this->ex_renuncia,
			'ex_observaciones' => $this->ex_observaciones,
			'fecha_ingreso' => $this->fecha_ingreso,
			'fecha_retiro' => $this->fecha_retiro,
			'casillero' => $this->casillero,
			'siges' => $this->siges,
			'biometrico' => $this->biometrico,
			'softcontrol' => $this->softcontrol,
			'cuenta_bmsc' => $this->cuenta_bmsc,
			'afp' => $this->afp,
			'foto' => $path,
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
			'office_id' => Auth::user()->people->office_id,
		]);
		$this->limpiar();
		$this->mensaje='Usuario creado exitosamente';
	}
	public function edit($id) {
		$user = User::find($id);
		$human = Human::find($id);
		$this->modelo_id = $user->id;
		$this->name = $user->name;
		$this->email = $user->email;
		$this->password = '';
		$this->role_id = $user->role_id;

		$this->password = $human->password;
		$this->nombre_completo = $human->nombre_completo;
		$this->ci = $human->ci;
		$this->fecha_nacimiento = $human->fecha_nacimiento;
		$this->direccion = $human->direccion;
		$this->zona = $human->zona;
		$this->telefono = $human->telefono;
		$this->telefono2 = $human->telefono2;
		$this->nivel_estudio = $human->nivel_estudio;
		$this->estado_civil = $human->estado_civil;
		$this->hijos = $human->hijos;
		$this->ex_empresa = $human->ex_empresa;
		$this->ex_cargo = $human->ex_cargo;
		$this->ex_tiempo = $human->ex_tiempo;
		$this->ex_jefe = $human->ex_jefe;
		$this->ex_renuncia = $human->ex_renuncia;
		$this->ex_observaciones = $human->ex_observaciones;
		$this->fecha_ingreso = $human->fecha_ingreso;
		$this->fecha_retiro = $human->fecha_retiro;
		$this->casillero = $human->casillero;
		$this->siges = $human->siges;
		$this->biometrico = $human->biometrico;
		$this->softcontrol = $human->softcontrol;
		$this->cuenta_bmsc = $human->cuenta_bmsc;
		$this->afp = $human->afp;
		/*$this->foto = $human->foto;*/
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

		$this->modal['accion'] = 'edit';
		$this->modal['active'] = true;
		$this->modal['title'] = 'Editar Arqueo';
	}
	public function update() {
		$user = User::find($this->modelo_id);
		$human = Human::find($this->modelo_id);
		if ($this->foto != null) {
			$this->foto->storeAs('public/photos', 'user_'.$user->id.'.JPG');
			$path = 'storage/photos/user_'.$user->id.'.JPG';
		} else {
			$path = $human->foto;
		}
		$this->validate([
			'name' => 'required',
			'password' => 'required',
			'role_id' => 'required',
		]);
		$user->update([
			'name' => $this->name,
			'email' => $this->email,
			'password' => Hash::make($this->password),
			'role_id' => $this->role_id,
		]);
		$human->update([
			'password' => $this->password,
			'nombre_completo' => $this->nombre_completo,
			'ci' => $this->ci,
			'fecha_nacimiento' => $this->fecha_nacimiento,
			'direccion' => $this->direccion,
			'zona' => $this->zona,
			'telefono' => $this->telefono,
			'telefono2' => $this->telefono2,
			'nivel_estudio' => $this->nivel_estudio,
			'estado_civil' => $this->estado_civil,
			'hijos' => $this->hijos,
			'ex_empresa' => $this->ex_empresa,
			'ex_cargo' => $this->ex_cargo,
			'ex_tiempo' => $this->ex_tiempo,
			'ex_jefe' => $this->ex_jefe,
			'ex_renuncia' => $this->ex_renuncia,
			'ex_observaciones' => $this->ex_observaciones,
			'fecha_ingreso' => $this->fecha_ingreso,
			'fecha_retiro' => $this->fecha_retiro,
			'casillero' => $this->casillero,
			'siges' => $this->siges,
			'biometrico' => $this->biometrico,
			'softcontrol' => $this->softcontrol,
			'cuenta_bmsc' => $this->cuenta_bmsc,
			'afp' => $this->afp,
			'foto' => $path,
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
		]);
		$this->limpiar();
		$this->mensaje='Usuario editado exitosamente';
	}
	public function select($id) {
		$this->modelo_id = $id;
		$this->delete = true;
	}
	public function destroy() {
		User::destroy($this->modelo_id);
		$this->delete_id = null;
		$this->delete = false;
		$this->mensaje='Usuario eliminado exitosamente';
	}
	public function limpiar() {
		$this->name = null;
		$this->email = null;
		$this->password = null;
		$this->role_id = null;
		$this->nombre_completo = null;
		$this->ci = null;
		$this->fecha_nacimiento = null;
		$this->direccion = null;
		$this->zona = null;
		$this->telefono = null;
		$this->telefono2 = null;
		$this->nivel_estudio = null;
		$this->estado_civil = null;
		$this->hijos = null;
		$this->ex_empresa = null;
		$this->ex_cargo = null;
		$this->ex_tiempo = null;
		$this->ex_jefe = null;
		$this->ex_renuncia = null;
		$this->ex_observaciones = null;
		$this->fecha_ingreso = null;
		$this->fecha_retiro = null;
		$this->casillero = null;
		$this->siges = null;
		$this->biometrico = null;
		$this->softcontrol = null;
		$this->cuenta_bmsc = null;
		$this->afp = null;
		$this->foto = null;
		$this->nombre_garante = null;
		$this->relacion_garante = null;
		$this->telefono_garante = null;
		$this->trabajo_garante = null;
		$this->direccion_garante = null;
		$this->nombre_referencia_personal = null;
		$this->relacion_referencia_personal = null;
		$this->telefono_referencia_personal = null;
		$this->trabajo_referencia_personal = null;
		$this->direccion_referencia_personal = null;

		$this->modal['active'] = false;
		$this->modal['title'] = '';
		$this->modal['url_pdf'] = '';
		$this->modal['accion'] = '';
		$this->delete = false;
	}
	public function openModalPDF($user_id) {
		$this->modal['accion'] = 'pdf';
		$this->modal['active'] = true;
		$this->modal['title'] = 'Imprimir Kardex Usuario #'.$user_id;
		$this->modal['url_pdf'] = 'admin/KARDEX-PDF/'.$user_id;
		$user = User::find($user_id);
		$pdf = PDF::loadView('pdf.kardex', compact('user'));
		return $pdf->setPaper('letter', 'portrait')->stream('Arqueo.pdf');
	}
}
