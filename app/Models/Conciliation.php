<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conciliation extends Model {
	use HasFactory;
	protected $fillable = ['fecha','fecha_deposito','fecha_conciliacion','deposito','monto','nro_deposito','observaciones','bank_id','office_id','user_id'];

	public function bank(){
		return $this->belongsTo(Bank::class);
	}
	public function office(){
		return $this->belongsTo(Office::class);
	}
	public function user(){
		return $this->belongsTo(User::class);
	}
}
