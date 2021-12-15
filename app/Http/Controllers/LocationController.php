<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Location;
use App\Models\City;

class LocationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin',['only' => ['index','create','edit','show']]);
    }
    public function index()
    {
        $locations = Location::orderBy('nombre','asc')->get();
        return view('admin/location/index',compact('locations'),['me'=>'MLOC','po'=>'LOC']);
    }

    public function create()
    {
        $cities = City::orderBy('id','DESC')->pluck('nombre', 'id');
        return view('admin/location/create',['cities'=>$cities,'me'=>'MLOC','po'=>'CLOC']);
    }

    public function store(Request $request)
    {
        Location::insert(request()->except('_token'));
        Session::flash('success','Location successfully registered!');
        return redirect('/admin/location');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $cities = City::orderBy('id','DESC')->pluck('nombre', 'id');
        $location = Location::findOrFail($id);
        return view('admin/location/edit',compact('location'),['cities'=>$cities,'me'=>'MLOC']);
    }

    public function update(Request $request, $id)
    {
        $data = request()->except(['_token','_method']);
        Location::where('id',$id)->update($data);
        Session::flash('success','Location successfully edited!');
        return redirect('/admin/location');
    }

    public function destroy($id)
    {
        Location::destroy($id);
        Session::flash('success','Location successfully removed!');
        return redirect('/admin/location');
    }
}
