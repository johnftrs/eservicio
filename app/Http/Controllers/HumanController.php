<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Human;

class HumanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin',['only' => ['index','create','edit','show']]);
    }
    public function index()
    {
        $peoples = Human::paginate(10);
        return view('admin/people/index',compact('peoples'),['me'=>'MEN','po'=>'MEN']);
    }

    public function create()
    {
        return view('admin/people/create',['me'=>'MEN','po'=>'CMEN']);
    }

    public function store(Request $request)
    {
        Human::insert(request()->except('_token'));
        Session::flash('success','Human successfully registered!');
        return redirect('/admin/people');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $people = Human::findOrFail($id);
        return view('admin/people/edit',compact('people'),['me'=>'MEN']);
    }

    public function update(Request $request, $id)
    {
        $data = request()->except(['_token','_method']);
        Human::where('id',$id)->update($data);
        Session::flash('success','Human successfully edited!');
        return redirect('/admin/people');
    }

    public function destroy($id)
    {
        Human::destroy($id);
        Session::flash('success','Human successfully removed!');
        return redirect('/admin/people');
    }
}
