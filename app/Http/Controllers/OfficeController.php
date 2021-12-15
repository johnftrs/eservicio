<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Office;

class OfficeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin',['only' => ['index','create','edit','show']]);
    }
    public function index()
    {
        $offices = Office::paginate(10);
        return view('admin/office/index',compact('offices'),['me'=>'MOFF','po'=>'OFF']);
    }

    public function create()
    {
        return view('admin/office/create',['me'=>'MOFF','po'=>'COFF']);
    }

    public function store(Request $request)
    {
        Office::insert(request()->except('_token'));
        Session::flash('success','Office successfully registered!');
        return redirect('/admin/office');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $office = Office::findOrFail($id);
        return view('admin/office/edit',compact('office'),['me'=>'MOFF']);
    }

    public function update(Request $request, $id)
    {
        $data = request()->except(['_token','_method']);
        Office::where('id',$id)->update($data);
        Session::flash('success','Office successfully edited!');
        return redirect('/admin/office');
    }

    public function destroy($id)
    {
        Office::destroy($id);
        Session::flash('success','Office successfully removed!');
        return redirect('/admin/office');
    }
}
