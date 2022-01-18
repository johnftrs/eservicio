<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Human extends Model
{
	use HasFactory;
	protected $fillable = [ 'password', 'nombre_completo', 'ci', 'fecha_nacimiento', 'direccion', 'zona', 'telefono', 'telefono2', 'nivel_estudio', 'estado_civil', 'hijos', 'ex_empresa', 'ex_cargo', 'ex_tiempo', 'ex_jefe', 'ex_renuncia', 'ex_observaciones', 'fecha_ingreso', 'fecha_retiro', 'casillero', 'siges', 'biometrico', 'softcontrol', 'cuenta_bmsc', 'afp', 'foto', 'nombre_garante', 'relacion_garante', 'telefono_garante', 'trabajo_garante', 'direccion_garante', 'nombre_referencia_personal', 'relacion_referencia_personal', 'telefono_referencia_personal', 'trabajo_referencia_personal', 'direccion_referencia_personal', 'office_id'	];
	public $timestamps = false;

	public function office(){
		return $this->belongsTo(Office::class);
	}
	public function user() {
		return $this->hasOne(User::class,'id');
	}
}
