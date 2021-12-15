<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Functionality extends Model {
    use HasFactory;
	protected $fillable = ['code', 'label', 'path', 'mostrar', 'menu_id'];
	public $timestamps = false;
	public function menu() {
		return $this->belongsTo(Menu::class);
	}
	public function roles()
	{
		return $this->belongsToMany(Role::class,'privileges');
	}
}
