<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory;
	protected $fillable = [ 'nombre', 'nit', 'correo', 'direccion', 'telefono', 'telefono2', 'representante_legal', 'representante_ci', 'representante_telefono', 'representante_telefono2', 'representante_email', 'representante_detalles', 'estado', 'office_id', 'user_id'];
    use SoftDeletes;

    public function office() {
        return $this->belongsTo(Office::class);
    }
	public function drivers() {
		return $this->hasMany(Driver::class);
	}
    public function vehicles() {
        return $this->hasMany(Vehicle::class);
    }
    public function asignations() {
        return $this->hasMany(Asignation::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
