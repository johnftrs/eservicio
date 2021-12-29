<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Human extends Model
{
    use HasFactory;
	protected $fillable = [ 'ci', 'nombre_completo', 'password', 'direccion', 'telefono', 'fecha_nacimiento', 'fecha_ingreso', 'nivel_estudio', 'biometrico', 'estado_civil', 'afp', 'foto', 'nombre_garante', 'relacion_garante', 'telefono_garante', 'trabajo_garante', 'direccion_garante', 'nombre_referencia_personal', 'relacion_referencia_personal', 'telefono_referencia_personal', 'trabajo_referencia_personal', 'direccion_referencia_personal', 'office_id' ];
	public $timestamps = false;
	
	public function office(){
		return $this->belongsTo(Office::class);
	}
    public function user() {
        return $this->hasOne(User::class,'id');
    }
}
