<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fuel extends Model {
    use HasFactory;
	protected $fillable = [ 'nombre', 'precio_compra', 'precio_venta', 'unidad', 'office_id'];
	public $timestamps = false;

	public function tanks() {
		return $this->hasMany(Tank::class);
	}
}
