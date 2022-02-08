<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
	use HasFactory;
	protected $fillable = [ 'inicio', 'fin', 'fecha', 'serie', 'office_id' ];

	public function office(){
		return $this->belongsTo(Office::class);
	}
	public function tickets() {
		return $this->hasMany(Ticket::class);
	}
	public function asignations() {
		return $this->hasMany(Asignation::class);
	}
	public function asignations_cli($cli_id) {
		return $this->hasMany(Asignation::class)->where('client_id',$cli_id);
	}
}
