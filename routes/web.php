<?php
use Illuminate\Support\Facades\Auth;
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


// User's Registration
Auth::routes();
Route::get('create_user', [App\Http\Controllers\Auth\RegisterController::class, 'getUserDetails']);
Route::get('create_user/getreportinglines/{id}', [App\Http\Controllers\Auth\RegisterController::class, 'getReportingLines']);


// requisition controller
Route::get('/op', [App\Http\Controllers\RequisitionController::class, 'createPdf']);
Route::get('requisition/{requisition}/delete_requisition', [App\Http\Controllers\RequisitionController::class, 'destroy'])->name('delete_requisition');
Route::get('requisition', [App\Http\Controllers\RequisitionController::class, 'getCategories'])->name('new_requisition');
Route::get('requisition/getitems/{id}', [App\Http\Controllers\RequisitionController::class, 'getItems']);
Route::post('/create_new_requisition',  [App\Http\Controllers\RequisitionController::class, 'store'])->name('store_new_requisition');
Route::get('/home', [App\Http\Controllers\RequisitionController::class, 'index'])->name('home');
Route::get('requisition/edit_categories', [App\Http\Controllers\RequisitionController::class, 'editCategories'])->name('edit');
Route::get('requisition/edititems/{id}', [App\Http\Controllers\RequisitionController::class, 'editItems']);
Route::get('requisition/pdf', [App\Http\Controllers\RequisitionController::class, 'requisitionPdf'])->name('requisition_pdf');


// Admin
Route::get('users', [App\Http\Controllers\AdminController::class, 'index']);
Route::get('user/{user}', [App\Http\Controllers\AdminController::class, 'delete'])->name('delete_user');


//Site Head and team Lead dashboard
Route::get('/sh', [App\Http\Controllers\ShTlController::class, 'index']);
Route::get('requisition/{requisition}/sh_tl_approve_requisition', [App\Http\Controllers\ShTlController::class, 'shTlApproval'])->name('sh_tl_approve_requisition');
Route::get('requisition/{requisition}/sh_tl_reject_requisition', [App\Http\Controllers\ShTlController::class, 'shTlRejection'])->name('sh_tl_reject_requisition');
Route::get('/sh_tl_approved', [App\Http\Controllers\ShTlController::class, 'shTlApproved'])->name('sh_tl_approved');
Route::get('/sh_tl_rejected', [App\Http\Controllers\ShTlController::class, 'shTlRejected'])->name('sh_tl_rejected');


// Manager
Route::get('/manager', [App\Http\Controllers\ManagerController::class, 'index']);
Route::get('requisition/{requisition}/manager_approve_requisition', [App\Http\Controllers\ManagerController::class, 'managerApproval'])->name('manager_approve_requisition');
Route::get('requisition/{requisition}/manager_reject_requisition', [App\Http\Controllers\ManagerController::class, 'managerRejection'])->name('manager_reject_requisition');
Route::get('/manager_action', [App\Http\Controllers\ManagerController::class, 'ManagerApproved'])->name('manager_actions');
Route::get('/manager_rejected', [App\Http\Controllers\ManagerController::class, 'ManagerRejected'])->name('manager_rejected');


// IC
Route::get('/ic', [App\Http\Controllers\IcController::class, 'index']);
Route::get('requisition/{requisition}/ic_approve_requisition', [App\Http\Controllers\IcController::class, 'icApproval'])->name('ic_approve_requisition');
Route::get('requisition/{requisition}/ic_reject_requisition', [App\Http\Controllers\IcController::class, 'icRejection'])->name('ic_reject_requisition');
Route::get('/ic_action', [App\Http\Controllers\IcController::class, 'IcApproved'])->name('ic_actions');
Route::get('/ic_rejected', [App\Http\Controllers\IcController::class, 'IcRejected'])->name('ic_rejected');

// 
Route::get('/store', [App\Http\Controllers\StoreController::class, 'index']);
Route::get('/store_action', [App\Http\Controllers\StoreController::class, 'storeProcess'])->name('store_action');
Route::get('/store_processed', [App\Http\Controllers\StoreController::class, 'storeProcessed'])->name('store_processed');
Route::get('/item', [App\Http\Controllers\StoreController::class, 'allItem'])->name('create_item');
Route::get('/all_items', [App\Http\Controllers\StoreController::class, 'allItem'])->name('item');
Route::post('/new_item', [App\Http\Controllers\StoreController::class, 'store'])->name('store_new_item');




// C Level
// Route::get('/clevel', [App\Http\Controllers\CLevelController::class, 'index']);
// Route::get('requisition/{requisition}/clevel_approve_requisition', [App\Http\Controllers\ClevelController::class, 'clevelApproval'])->name('clevel_approve_requisition');
// Route::get('requisition/{requisition}/clevel_reject_requisition', [App\Http\Controllers\ClevelController::class, 'clevelRejection'])->name('clevel_reject_requisition');
