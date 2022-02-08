<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model {
    use HasFactory;
    protected $fillable = ['nombre','cuenta','moneda','monto', 'office_id'];
    
	public function office(){
		return $this->belongsTo(Office::class);
	}
}
