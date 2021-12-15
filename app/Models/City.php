<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
	protected $fillable = ['code','nombre','coordenada'];
	public $timestamps = false;

	public function locations() {
		return $this->hasMany(Location::class);
	}
	public function offices() {
		return $this->hasMany(Office::class);
	}
	public function orders() {
		return $this->hasMany(Order::class);
	}
	public function deudas() {
		return $this->hasMany(Payment::class);
	}
}
