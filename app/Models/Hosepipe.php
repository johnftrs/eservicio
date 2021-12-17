<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hosepipe extends Model {
    use HasFactory;
	protected $fillable = [ 'nombre', 'fuel_id', 'tank_id', 'dispenser_id'];
	public $timestamps = false;

    public function tank() {
        return $this->belongsTo(Tank::class);
    }
    public function dispenser() {
        return $this->belongsTo(Dispenser::class);
    }
}
