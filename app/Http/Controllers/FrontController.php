<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FrontController extends Controller
{
	public function index()
	{
		if (Session::has('success')) {
			Session::flash('success',Session::get('success'));
		}
		if (Session::has('error')) {
			Session::flash('error',Session::get('error'));
		}
		if (Session::has('alert')) {
			Session::flash('alert',Session::get('alert'));
		}
		return view('admin/cuaderno/index',null,['me'=>'SER','po'=>'CUA']);
	}
}
