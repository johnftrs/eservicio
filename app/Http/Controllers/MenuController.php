<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Menu;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin',['only' => ['index','create','edit','show']]);
    }
    public function index()
    {
        $menus = Menu::get();
        return view('admin/menu/index',compact('menus'),['me'=>'MMEN','po'=>'MEN']);
    }

    public function create()
    {
        return view('admin/menu/create',['me'=>'MMEN','po'=>'CMEN']);
    }

    public function store(Request $request)
    {
        Menu::insert(request()->except('_token'));
        Session::flash('success','Menu successfully registered!');
        return redirect('/admin/menu');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('admin/menu/edit',compact('menu'),['me'=>'MMEN']);
    }

    public function update(Request $request, $id)
    {
        $data = request()->except(['_token','_method']);
        Menu::where('id',$id)->update($data);
        Session::flash('success','Menu successfully edited!');
        return redirect('/admin/menu');
    }

    public function destroy($id)
    {
        Menu::destroy($id);
        Session::flash('success','Menu successfully removed!');
        return redirect('/admin/menu');
    }
}
