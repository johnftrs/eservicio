<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model {
    use HasFactory;
    protected $fillable = ['fecha', 'monto_total', 'efectivo', 'tarjeta', 'firmado', 'calibracion', '_200', '_100', '_50', '_20', '_10', 'monedas', 'user_id', 'turn_id', 'office_id' ];
    use SoftDeletes;

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
    public function editar() {
        $ultimo = Report::where('office_id',$this->office_id)->where('user_id',$this->user_id)->orderBy('id','desc')->first();
        if ( $this->id == $ultimo->id && $this->firmado!='Y' ) {
            return true;
        } else {
            return false;
        }
    }
}
