<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
	protected $fillable = [ 'nombre', 'nit', 'correo', 'direccion', 'telefono', 'telefono2', 'representante_legal', 'representante_ci', 'representante_telefono', 'representante_telefono2', 'representante_email', 'representante_detalles', 'estado', 'location_id', 'city_id', 'office_id', 'user_id'];

    public function city() {
        return $this->belongsTo(City::class);
    }
    public function location() {
        return $this->belongsTo(Location::class);
    }
    public function office() {
        return $this->belongsTo(Office::class);
    }
	public function drivers() {
		return $this->hasMany(Driver::class);
	}
    public function vehicles() {
        return $this->hasMany(Vehicle::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
