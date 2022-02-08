<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
	use HasFactory;
	protected $fillable = [ 'codigo', 'monto', 'estado', 'fecha_uso', 'detalle', 'driver_id', 'vehicle_id', 'dispenser_id', 'turn_id', 'user_id', 'report_id', 'lot_id', 'asignation_id' ];

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
	public function lot(){
		return $this->belongsTo(Lot::class);
	}
	public function asignation(){
		return $this->belongsTo(Asignation::class);
	}
    public function user() {
        return $this->belongsTo(User::class);
    }
}
