<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model {
    use HasFactory;
	protected $fillable = ['code','label','icon','orden','tamanyo'];
	public $timestamps = false;
	
	public function functionalities() {
		return $this->hasMany(Functionality::class);
	}
}
