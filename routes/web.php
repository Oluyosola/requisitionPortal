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
Route::get('/requisition', [App\Http\Controllers\RequisitionController::class, 'select'])->name('requisition');
//  function (){
    // return view('requisition');
// });
// Route::get('/', );
Route::get('/unit', [App\Http\Controllers\Auth\RegisterController::class, 'select']);
// Route::post('/register',  [App\Http\Controllers\Auth\RegisterController::class, 'create']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
