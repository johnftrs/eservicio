<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispenser extends Model {
    use HasFactory;
	protected $fillable = [ 'nombre', 'meter', 'fuel_id', 'tank_id', 'office_id'];
	public $timestamps = false;

    public function fuel() {
        return $this->belongsTo(Fuel::class);
    }
    public function tank() {
        return $this->belongsTo(Tank::class);
    }
    public function office() {
        return $this->belongsTo(Office::class);
    }
    public function hosepipes() {
        return $this->hasMany(Hosepipe::class);
    }
}
