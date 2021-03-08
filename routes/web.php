<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckStatus;


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
Route::get('/create_user', [App\Http\Controllers\Auth\RegisterController::class, 'getUserDetails']);

// requisition controller
Route::get('requisition', [App\Http\Controllers\RequisitionController::class, 'getCategories'])->name('new_requisition');
Route::get('requisition/getitems/{id}', [App\Http\Controllers\RequisitionController::class, 'getItems']);
Route::post('/create_new_requisition',  [App\Http\Controllers\RequisitionController::class, 'store'])->name('store_new_requisition');
Route::get('/home',  [App\Http\Controllers\RequisitionController::class, 'index'])->name('home');
Route::get('delete/{id}',  [App\Http\Controllers\RequisitionController::class, 'destroy'])->name('delete_requisition');



Route::get('/sh', function(){
    return view('sh_th_dashboard');
});