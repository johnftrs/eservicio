<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
	protected $fillable = [ 'nombre', 'nit', 'direccion', 'telefono', 'telefono2', 'representante_legal', 'representante_ci', 'representante_telefono', 'representante_telefono2', 'representante_email', 'representante_detalles', 'estado', 'location_id'	];

    public function city() {
        return $this->belongsTo(City::class);
    }
    public function location() {
        return $this->belongsTo(Location::class);
    }
    public function office() {
        return $this->belongsTo(Office::class);
    }
	public function orders() {
		return $this->hasMany(Order::class)->orderBy('fecha_registro','desc');
	}
    public function user() {
        return $this->belongsTo(User::class);
    }
}
