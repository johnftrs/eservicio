<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispenser extends Model {
    use HasFactory;
	protected $fillable = [ 'nombre', 'office_id'];
	public $timestamps = false;

    public function office() {
        return $this->belongsTo(Office::class);
    }
}
