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
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('requisition', [App\Http\Controllers\RequisitionController::class, 'getCategories'])->name('home');
Route::get('requisition/getitems/{id}', [App\Http\Controllers\RequisitionController::class, 'getItems']);
Route::post('/create',  [App\Http\Controllers\RequisitionController::class, 'store'])->name('new_requiisition');
Route::get('/home',  [App\Http\Controllers\RequisitionController::class, 'index'])->name('requisition');
Route::get('delete/{id}',  [App\Http\Controllers\RequisitionController::class, 'destroy'])->name('delete_requisition');
// Route::post('home',  [App\Http\Controllers\RequisitionController::class, 'update'])->name('update_requisition');
// Route::get('delete/{id}', 'CompanyController@destroy')->name('trash_company');


Route::get('/create_user', [App\Http\Controllers\Auth\RegisterController::class, 'select']);
// Route::post('/create_user', [App\Http\Controllers\Auth\RegisterController::class, 'create'])->name('register');


// Route::middleware([CheckStatus::class])->group(function(){

//     Route::get('/home',  [App\Http\Controllers\RequisitionController::class, 'index'])->name('requisition');

// ); }