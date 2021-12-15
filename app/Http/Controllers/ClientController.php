<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Client;
use App\Models\City;
use App\Models\Location;
use App\Models\Office;
use Auth;
use carbon\Carbon;

class ClientController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin',['only' => ['index','create','edit','show']]);
    }
    public function index() {
        $clients = Client::orderBy('nombre','asc')->get();
        return view('admin/client/index',compact('clients'),['me'=>'MCLI','po'=>'CLI']);
    }
    public function create() {
        $cities = City::pluck('nombre','id');
        $locations = Location::pluck('nombre','id');
        $offices = Office::pluck('nombre','id');
        return view('admin/client/create',['offices'=>$offices,'locations'=>$locations,'cities'=>$cities,'me'=>'MCLI','po'=>'CCLI']);
    }
    public function car($id) {
        $clients = Client::orderBy('id','asc')->pluck('nombre','id');
        return view('admin/car/create',['clients'=>$clients,'client_id'=>$id,'me'=>'MCLI','po'=>'CLI']);
    }
    public function list_car($id) {
        $client = Client::find($id);
        return $client->cars;
    }
    public function store(Request $request) {
        $request['user_id'] = Auth::id();
        $request['office_id'] = Auth::user()->people->office_id;
        $request['fecha_registro'] = Carbon::now();
        Client::insert(request()->except('_token'));
        Session::flash('success','Client successfully registered!');
        return redirect('/admin/client');
    }
    public function edit($id) {
        $cities = City::pluck('nombre','id');
        $locations = Location::pluck('nombre','id');
        $offices = Office::pluck('nombre','id');
        $client = Client::findOrFail($id);
        return view('admin/client/edit',compact('client'),['offices'=>$offices,'locations'=>$locations,'cities'=>$cities,'me'=>'CLI']);
    }
    public function update(Request $request, $id) {
        $request['user_id'] = Auth::id();
        $request['office_id'] = Auth::user()->people->office_id;
        $data = request()->except(['_token','_method']);
        Client::where('id',$id)->update($data);
        Session::flash('success','Client successfully edited!');
        return redirect('/admin/client');
    }
    public function destroy($id) {
        Client::destroy($id);
        Session::flash('success','Client successfully removed!');
        return redirect('/admin/client');
    }
}
