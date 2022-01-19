<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\FrontLivewire;
use App\Http\Livewire\UserLivewire;
use App\Http\Livewire\MenuLivewire;
use App\Http\Livewire\FunctionalityLivewire;
use App\Http\Livewire\RoleLivewire;
use App\Http\Livewire\OfficeLivewire;
use App\Http\Livewire\ClientLivewire;
use App\Http\Livewire\DispenserLivewire;
use App\Http\Livewire\TicketLivewire;
use App\Http\Livewire\FuelLivewire;
use App\Http\Livewire\ReportLivewire;
use App\Http\Livewire\TurnLivewire;
use App\Http\Livewire\ActivadorLivewire;
use App\Http\Livewire\MovdiarioLivewire;
use App\Http\Livewire\MovfechasLivewire;
use App\Http\Livewire\BuySellLivewire;
use App\Http\Livewire\BankLivewire;

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
Route::get('/admin/office',OfficeLivewire::class)->middleware('auth');
Route::get('/admin/client',ClientLivewire::class)->middleware('auth');
Route::get('/admin/dispenser',DispenserLivewire::class)->middleware('auth');
Route::get('/admin/ticket',TicketLivewire::class)->middleware('auth');
Route::get('/admin/fuel',FuelLivewire::class)->middleware('auth');
Route::get('/admin/arching',ReportLivewire::class)->middleware('auth');
Route::get('/admin/turn',TurnLivewire::class)->middleware('auth');
Route::get('/admin/buysell',BuySellLivewire::class)->middleware('auth');
Route::get('/admin/bank',BankLivewire::class)->middleware('auth');
Route::get('/admin/activar/ticket/{variable?}',ActivadorLivewire::class)->middleware('auth');
Route::get('/admin/ARQUEO-PDF/{report_id?}', [ReportLivewire::class, 'openModalPDF'])->middleware('auth');
Route::get('/admin/KARDEX-PDF/{user_id?}', [UserLivewire::class, 'openModalPDF'])->middleware('auth');
Route::get('/admin/report/movimiento_diario', MovdiarioLivewire::class)->middleware('auth');
Route::get('/admin/pdf/movimiento_diario/{id?}/{date?}', [MovdiarioLivewire::class, 'openModalPDF'])->middleware('auth');
Route::get('/admin/report/movimiento_por_fechas', MovfechasLivewire::class)->middleware('auth');
Route::get('/admin/pdf/movimiento_por_fechas/{id}/{date}/{date2}', [MovfechasLivewire::class, 'openModalPDF'])->middleware('auth');


/*
Los datos son los siguientes:
ID ANYDESK: 576372323
Contraseña: SurdidorLotus
Usuario Siges: ELWAR ORELLANA
Contraseña: 7814
*/