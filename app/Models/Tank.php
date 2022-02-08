<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tank extends Model {
    use HasFactory;
	protected $fillable = [ 'nombre', 'total', 'actual', 'fuel_id', 'office_id'];

    public function fuel() {
        return $this->belongsTo(Fuel::class);
    }
	public function office(){
		return $this->belongsTo(Office::class);
	}
}
