<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
	protected $fillable = ['nombre', 'coordenada', 'city_id'];
	public $timestamps = false;

	public function city() {
		return $this->belongsTo(City::class);
	}
}

