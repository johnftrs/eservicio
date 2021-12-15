<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model {
    use HasFactory;
	protected $fillable = ['id','code', 'name'];
	public $timestamps = false;
	public function functionalities(){
		return $this->belongsToMany(Functionality::class,'privileges');
	}
	public function functionalitiesByMenuCode($code){
		return $this->belongsToMany(Functionality::class,'privileges')->join('menus','functionalities.menu_id','=','menus.id')->where('menus.code',$code)->get();
	}
	public function hasFunctionality($code){
		return count($this->belongsToMany(Functionality::class,'privileges')->where('functionalities.code',$code)->get());
	}
	public function menus(){
		return $this->belongsToMany(Functionality::class,'privileges')->join('menus','functionalities.menu_id','=','menus.id')->select('menus.*')->orderBy('menus.orden')->distinct('menus.id')->get()->unique();
	}
	public function users(){
		return $this->belongsToMany(User::class);
	}
}
