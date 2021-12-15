<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\FunctionalityController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\ClientController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('/home',FrontController::class)->middleware('auth');
Route::resource('/user',UserController::class)->middleware('auth');
Route::resource('/admin/menu',MenuController::class)->middleware('auth');
Route::resource('/admin/functionality',FunctionalityController::class)->middleware('auth');
Route::resource('/admin/role',RoleController::class)->middleware('auth');
Route::resource('/admin/city',CityController::class)->middleware('auth');
Route::resource('/admin/location',LocationController::class)->middleware('auth');
Route::resource('/admin/office',OfficeController::class)->middleware('auth');
Route::resource('/admin/client',ClientController::class)->middleware('auth');