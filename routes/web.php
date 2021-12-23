<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\FrontLivewire;
use App\Http\Livewire\UserLivewire;
use App\Http\Livewire\MenuLivewire;
use App\Http\Livewire\FunctionalityLivewire;
use App\Http\Livewire\RoleLivewire;
use App\Http\Livewire\CityLivewire;
use App\Http\Livewire\LocationLivewire;
use App\Http\Livewire\OfficeLivewire;
use App\Http\Livewire\ClientLivewire;
use App\Http\Livewire\DispenserLivewire;
use App\Http\Livewire\TicketLivewire;
use App\Http\Livewire\FuelLivewire;
use App\Http\Livewire\ActivadorLivewire;

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
    return redirect('login');
});

Auth::routes();

Route::get('/home',FrontLivewire::class)->middleware('auth');
Route::get('/user',UserLivewire::class)->middleware('auth');
Route::get('/admin/menu',MenuLivewire::class)->middleware('auth');
Route::get('/admin/functionality',FunctionalityLivewire::class)->middleware('auth');
Route::get('/admin/role',RoleLivewire::class)->middleware('auth');
Route::get('/admin/city',CityLivewire::class)->middleware('auth');
Route::get('/admin/location',LocationLivewire::class)->middleware('auth');
Route::get('/admin/office',OfficeLivewire::class)->middleware('auth');
Route::get('/admin/client',ClientLivewire::class)->middleware('auth');
Route::get('/admin/dispenser',DispenserLivewire::class)->middleware('auth');
Route::get('/admin/ticket',TicketLivewire::class)->middleware('auth');
Route::get('/admin/fuel',FuelLivewire::class)->middleware('auth');
Route::get('/admin/activar/ticket/{variable?}',ActivadorLivewire::class)->middleware('auth');