<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Role;
use Validator;
use Auth;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (Auth::user()->hasRole('ROOT')) {
            $roles = Role::get();
        } else {
            $roles = Role::where('id','>',1)->get();
        }
        return view('admin/role/index',compact('roles'),['me'=>'MROL','po'=>'ROL']);
    }

    public function create()
    {
        $menus = \App\Models\Menu::all();
        return view('admin/role/create',['menus'=>$menus,'me'=>'MROL','po'=>'CROL']);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|unique:roles',
            'name' => 'required|unique:roles',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/role/create')
            ->withErrors($validator)
            ->withInput();
        }
        Role::create($request->all());
        if (!empty($request['functionalities'])){
            $role = Role::where('code', '=', $request['code'])->first();
            $role->functionalities()->attach($request['functionalities']);
        }
        Session::flash('success','Role successfully registered!');
        return redirect('/admin/role');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $menus = \App\Models\Menu::all();
        $role = Role::findOrFail($id);
        return view('admin/role/edit',compact('role'),['menus'=>$menus,'me'=>'MROL']);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|unique:roles,code,'.$id.',id',
            'name' => 'required|unique:roles,name,'.$id.',id'
        ]);

        if ($validator->fails()) {
            return redirect('/admin/role/'.$id.'/edit')
            ->withErrors($validator)
            ->withInput();
        }
        $role = Role::findOrFail($id);
        $role->fill($request->all());
        $role->save();
        $role->functionalities()->detach();
        if (!empty($request['functionalities'])){
            $role->functionalities()->attach($request['functionalities']);
        }
        Session::flash('success','Role successfully edited!');
        return redirect('/admin/role');
    }

    public function destroy($id)
    {
        Role::destroy($id);
        Session::flash('success','Role successfully removed!');
        return redirect('/admin/role');
    }
}
