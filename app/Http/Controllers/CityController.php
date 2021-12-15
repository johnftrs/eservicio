<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\City;

class CityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin',['only' => ['index','create','edit','show']]);
    }
    public function index()
    {
        $cities = City::paginate(10);
        return view('admin/city/index',compact('cities'),['me'=>'MCIT','po'=>'CIT']);
    }

    public function create()
    {
        return view('admin/city/create',['me'=>'MCIT','po'=>'CCIT']);
    }

    public function store(Request $request)
    {
        City::insert(request()->except('_token'));
        Session::flash('success','Ciudad registrada satisfactoriamente!');
        return redirect('/admin/city');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $city = City::findOrFail($id);
        return view('admin/city/edit',compact('city'),['me'=>'MCIT']);
    }

    public function update(Request $request, $id)
    {
        $data = request()->except(['_token','_method']);
        City::where('id',$id)->update($data);
        Session::flash('success','Ciudad editada satisfactoriamente!');
        return redirect('/admin/city');
    }

    public function destroy($id)
    {
        City::destroy($id);
        Session::flash('success','Ciudad removida satisfactoriamente!');
        return redirect('/admin/city');
    }
}
