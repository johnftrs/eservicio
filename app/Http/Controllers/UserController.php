<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\UserCreateRequest;
use Illuminate\Routing\Route;
use App\Models\User;
use App\Models\People;
use App\Models\Role;
use App\Models\Location;
use App\Models\City;
use App\Models\Office;
use Auth;
use Hash;
use Validator;
use App\Mail\TestMail;
use Mail;

class UserController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth',['only' => ['index','edit','show','destroy','changePasswordForm']]);
    }

    public function index()
    {
        $users = User::paginate(10);
        return view('user/index',compact('users'),['me'=>'MUSE','po'=>'USE']);
    }

    public function create()
    {
        $roles = Role::pluck('name', 'id');
        $locations = Location::pluck('nombre', 'id');
        $cities = City::pluck('nombre', 'id');
        $offices = Office::pluck('razon_social', 'id');
        return view('user/create',['roles'=>$roles,'locations'=>$locations,'cities'=>$cities,'offices'=>$offices,'me'=>'MUSE','po'=>'CUSE']);
    }

    public function store(Request $request)
    {
        $user = New User;
        $user->fill([
            'name' => $request['name'],
            'email' => $request['email'],
            'role_id' => $request['role_id'],
            'password' => bcrypt($request['password'])
        ]);
        $user->save();
        $people = New People;
        $people->fill([
            'id' => $user->id,
            'ci' => $request['ci'],
            'nombre' => $request['nombre'],
            'direccion' => $request['direccion'],
            'telefono' => $request['telefono'],
            'telefono2' => $request['telefono2'],
            'location_id' => $request['location_id'],
            'city_id' => $request['city_id'],
            'office_id' => $request['office_id']
        ]);
        $people->save();
        Session::flash('success','usuario registrado exitosamente!');
        return redirect('/user');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $roles = Role::pluck('name', 'id');
        $user = User::findOrFail($id);
        $locations = Location::pluck('nombre', 'id');
        $cities = City::pluck('nombre', 'id');
        $offices = Office::pluck('razon_social', 'id');
        return view('user/edit',compact('user'),['roles'=>$roles,'locations'=>$locations,'cities'=>$cities,'offices'=>$offices,'me'=>'MUSE']);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:users,name,'.$id.',id'
        ]);
        if ($validator->fails()) {
            return redirect('/user/'.$id.'/edit')
            ->withErrors($validator)
            ->withInput();
        }
        $data = request()->except(['_token','_method']);
        /*User::where('id',$id)->update($data);*/
        /*$user = new User;*/
        $user = User::findOrFail($id);
        $user->fill([
            'name' => $request['name'],
            'email' => $request['email'],
            'role_id' => $request['role_id']
        ]);
        if ($request['password']!=null) {
            $user->password = bcrypt($request['password']);
        }
        $user->save();
        $user->people->fill([
            'nombre' => $request['nombre'],
            'ci' => $request['ci'],
            'direccion' => $request['direccion'],
            'telefono' => $request['telefono'],
            'telefono2' => $request['telefono2'],
            'fecha_nacimiento' => $request['fecha_nacimiento'],
            'fecha_ingreso' => $request['fecha_ingreso'],
            'location_id' => $request['location_id'],
            'city_id' => $request['city_id'],
            'office_id' => $request['office_id']
        ]);
        $user->people->save();
        /*People::where('id',$id)->update($data);*/
        Session::flash('success','Contact successfully edited!');
        return redirect('/user');
    }

    public function destroy($id)
    {
        User::destroy($id);
        Session::flash('success','Contact successfully removed!');
        return redirect('/user');
    }

    public function changePassword(Request $request)
    {
        if (Auth::user()) {
            if (Hash::check($request['passwordold'], Auth::user()->password) && $request['password'] == $request['password_confirmation']) {
                $user = Auth::user();
                $user->password = bcrypt($request['password']);
                $user->save();
                Session::flash('success','Password changed successfully');
                return redirect()->to('admin');
            } else {
                Session::flash('error','Incorrect data');
                return redirect('pass/changePasswordForm');
            }
        } else {
            return redirect()->to('/');
        }

        Session::flash('success','Usuario registrado exitosamente');
        return redirect('admin')
        ->withErrors('Contraseña Cambiada Correctamente')
        ->withInput();
    }

    public function changePasswordForm(Request $request)
    {
        if (Auth::user()) {
            return view('auth.changePassword');
        } else {
            return redirect()->to('/');
        }
    }
}
