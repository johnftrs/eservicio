<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuySell extends Model {
    use HasFactory;
    protected $fillable = [ 'fecha_descarga', 'fecha_compra', 'hora_descarga', 'cantidad', 'nro_compra', 'factura', 'papeleria', 'adicional', 'debito_banco', 'vehiculo', 'chofer', 'responsable', 'observaciones', 'tipo', 'bank_id', 'tank_id' ];
    public $timestamps = false;

    public function bank() {
        return $this->belongsTo(Bank::class);
    }
    public function tank() {
        return $this->belongsTo(Tank::class);
    }
}
