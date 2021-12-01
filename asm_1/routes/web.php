<?php

use App\Http\Controllers\CarsController;
use App\Http\Controllers\PassengersController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
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
Route::prefix('car')->middleware('auth')->group(function() {
    Route::get('/',[CarsController::class,'index'])->name('car.index');
    Route::get('add', [CarsController::class, 'addForm'])->name('car.add');
    Route::post('add', [CarsController::class, 'saveAdd']);
    Route::get('edit/{id}', [CarsController::class, 'editForm'])->name('car.edit');
    Route::post('edit/{id}', [CarsController::class, 'saveEdit']);
    Route::get('remove/{id}',[CarsController::class,'remove'])->name('car.remove');
});
Route::prefix('passenger')->middleware('auth')->group(function() {
    Route::get('/',[PassengersController::class,'index'])->name('passenger.index');
    Route::get('add', [PassengersController::class, 'addForm'])->name('passenger.add');
    Route::post('add', [PassengersController::class, 'saveAdd']);
    Route::get('edit/{id}', [PassengersController::class, 'editForm'])->name('passenger.edit');
    Route::post('edit/{id}', [PassengersController::class, 'saveEdit']);
    Route::get('remove/{id}',[PassengersController::class,'remove'])->name('passenger.remove');
});
Route::prefix('user')->middleware('auth')->group(function() {
    Route::get('/',[UsersController::class,'index'])->name('user.index');
    Route::get('remove/{id}',[UsersController::class,'remove'])->name('user.remove');
});
Route::get('login', [LoginController::class, 'loginForm'])->name('login');
Route::post('login', [LoginController::class, 'postLogin']);
Route::any('logout', function(){
    Auth::logout();
    return redirect(route('login'));
});