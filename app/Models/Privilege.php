<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Privilege extends Model
{
    use HasFactory;
	protected $fillable = ['functionality_id','role_id'];
	public $timestamps = false;

	public function functionality() {
		return $this->belongsTo(Functionality::class);
	}
	public function role() {
		return $this->belongsTo(Role::class);
	}
}
