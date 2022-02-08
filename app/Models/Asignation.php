<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignation extends Model
{
	use HasFactory;
	protected $fillable = [ 'inicio', 'fin', 'estado', 'fecha', 'detalle', 'client_id', 'lot_id' ];

	public function client() {
		return $this->belongsTo(Client::class);
	}
	public function tickets() {
		return $this->hasMany(Ticket::class);
	}
}
