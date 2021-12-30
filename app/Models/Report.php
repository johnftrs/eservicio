<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model {
    use HasFactory;
    protected $fillable = ['fecha', 'monto_total', 'efectivo', 'tarjeta', 'firmado', '_200', '_100', '_50', '_20', '_10', 'monedas', 'user_id', 'turn_id', 'office_id' ];
    public $timestamps = false;

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function turn() {
        return $this->belongsTo(Turn::class);
    }
    public function office() {
        return $this->belongsTo(Office::class);
    }
    public function accountings() {
        return $this->hasMany(Accounting::class);
    }
    public function tickets() {
        return $this->hasMany(Ticket::class);
    }
}
