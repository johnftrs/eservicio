<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turn extends Model
{
    use HasFactory;
    protected $fillable = [ 'nombre', 'estado', 'hora_inicio', 'hora_fin', 'office_id' ];
    public $timestamps = false;

    public function office() {
        return $this->belongsTo(Office::class);
    }
}
