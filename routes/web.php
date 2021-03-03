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
    return view('test');
});
Route::get('/check', function () {
    return view('check');
});

Auth::routes();
Route::get('requisition', [App\Http\Controllers\RequisitionController::class, 'getCategories'])->name('requisition');
Route::get('requisition/getitems/{id}', [App\Http\Controllers\RequisitionController::class, 'getItems']);

Route::get('/unit', [App\Http\Controllers\Auth\RegisterController::class, 'select']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
