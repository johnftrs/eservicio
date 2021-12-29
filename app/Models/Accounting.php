<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounting extends Model {
    use HasFactory;
    protected $fillable = ['cantidad','meter_inicial','meter_final','tipo','report_id','dispenser_id','user_id'];
    public $timestamps = false;
    
    public function report() {
        return $this->belongsTo(Report::class);
    }
    public function dispenser() {
        return $this->belongsTo(Dispenser::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
