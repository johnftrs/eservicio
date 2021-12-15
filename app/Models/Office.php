<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;
	protected $fillable = ['razon_social','nit','direccion','coordenada','location_id'];
	public $timestamps = false;

	public function peoples() {
		return $this->hasMany(People::class);
	}
	public function users() {
		return $this->hasMany(User::class);
	}
	public function orders() {
		return $this->hasMany(Order::class);
	}
	public function location() {
		return $this->belongsTo(Location::class);
	}
}
