<?php

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();


Route::resource('campuses',App\Http\Controllers\CampusController::class);
Route::resource('menus',App\Http\Controllers\MenuController::class);
Route::resource('bars',App\Http\Controllers\BarController::class);
Route::resource('buzons',App\Http\Controllers\BuzonController::class);
Route::resource('preferencias',App\Http\Controllers\PreferenciaController::class);
Route::resource('snacks',App\Http\Controllers\SnackController::class);
Route::resource('buz_prefe',App\Http\Controllers\Preferencias_User::class);
Route::resource('buz_buz',App\Http\Controllers\Buzon_User::class);
///admin
//Route::get('',[HomeController::class,'index'])->name('home');
Route::resource('users',UserController::class)->names('admin.users');

Route::resource('roles',RoleController::class)->names('admin.roles');

Route::get('/',[App\Http\Controllers\PublicController::class, 'index'])->name('public');

