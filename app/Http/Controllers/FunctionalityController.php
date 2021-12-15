<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Functionality;
use App\Models\Menu;

class FunctionalityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin',['only' => ['index','create','edit','show']]);
    }
    public function index()
    {
        $functionalities = Functionality::get();
        return view('admin/functionality/index',compact('functionalities'),['functionalities'=>$functionalities,'me'=>'MFUN','po'=>'FUN']);
    }

    public function create()
    {
        $menus = Menu::orderBy('id','DESC')->pluck('label', 'id');
        return view('admin/functionality/create',['menus'=>$menus,'me'=>'MFUN','po'=>'CFUN']);
    }

    public function store(Request $request)
    {
        Functionality::insert(request()->except('_token'));
        Session::flash('success','Functionality successfully registered!');
        return redirect('/admin/functionality');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $menus = Menu::pluck('label', 'id');
        $functionality = Functionality::findOrFail($id);
        return view('admin/functionality/edit',compact('functionality'),['menus'=>$menus,'me'=>'MFUN']);
    }

    public function update(Request $request, $id)
    {
        $data = request()->except(['_token','_method']);
        Functionality::where('id',$id)->update($data);
        Session::flash('success','Functionality successfully edited!');
        return redirect('/admin/functionality');
    }

    public function destroy($id)
    {
        Functionality::destroy($id);
        Session::flash('success','Functionality successfully removed!');
        return redirect('/admin/functionality');
    }
}
