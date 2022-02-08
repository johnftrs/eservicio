<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factor extends Model {
    use HasFactory;
    protected $fillable = ['factor','fecha_inicial','fecha_final', 'office_id', 'user_id'];
	public function office(){
		return $this->belongsTo(Office::class);
	}
	public function user(){
		return $this->belongsTo(User::class);
	}
}
