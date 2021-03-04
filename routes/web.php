<?php

use Illuminate\Support\Facades\Route;

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
    return view('index');
});

Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('requisition', [App\Http\Controllers\RequisitionController::class, 'getCategories'])->name('requisition');
Route::get('requisition/getitems/{id}', [App\Http\Controllers\RequisitionController::class, 'getItems']);
Route::post('/create',  [App\Http\Controllers\RequisitionController::class, 'store'])->name('new_requiisition');
Route::get('/home',  [App\Http\Controllers\RequisitionController::class, 'index']);

Route::get('/unit', [App\Http\Controllers\Auth\RegisterController::class, 'select']);


