<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
	use HasFactory;
	protected $fillable = [ 'codigo', 'monto', 'estado', 'tipo', 'fecha_uso', 'driver_id', 'vehicle_id', 'hosepipe_id', 'turn_id', 'user_id' ];
	public $timestamps = false;

	public function driver() {
		return $this->belongsTo(Driver::class);
	}
	public function vehicle() {
		return $this->belongsTo(Vehicle::class);
	}
	public function hosepipe() {
		return $this->belongsTo(Hosepipe::class);
	}
	public function turn() {
		return $this->belongsTo(Turn::class);
	}
	public function user() {
		return $this->belongsTo(User::class);
	}
}
