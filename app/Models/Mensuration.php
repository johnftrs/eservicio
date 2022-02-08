<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensuration extends Model {
    use HasFactory;
    protected $fillable = ['lectura','fecha','hora','observaciones', 'office_id', 'user_id'];
    
	public function office(){
		return $this->belongsTo(Office::class);
	}
	public function user(){
		return $this->belongsTo(User::class);
	}
}
