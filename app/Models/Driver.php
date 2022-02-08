<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model {
    use HasFactory;
	protected $fillable = ['ci','nombre','paterno','materno','licencia','estado','client_id'];
	
	public function client() {
		return $this->belongsTo(Client::class);
	}
}
