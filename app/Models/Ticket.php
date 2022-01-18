<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
	use HasFactory;
	protected $fillable = [ 'codigo', 'serie', 'monto', 'estado', 'fecha_uso', 'detalle', 'driver_id', 'vehicle_id', 'dispenser_id', 'turn_id', 'user_id', 'office_id', 'report_id' ];
	public $timestamps = false;

	public function driver() {
		return $this->belongsTo(Driver::class);
	}
	public function vehicle() {
		return $this->belongsTo(Vehicle::class);
	}
	public function dispenser() {
		return $this->belongsTo(Dispenser::class);
	}
	public function turn() {
		return $this->belongsTo(Turn::class);
	}
	public function report() {
		return $this->belongsTo(Report::class);
	}
	public function user() {
		return $this->belongsTo(User::class);
	}
}
