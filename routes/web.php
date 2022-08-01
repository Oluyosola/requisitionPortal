<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RequisitionController;
use App\Http\Controllers\ShTlController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\IcController;
use App\Http\Controllers\StoreController;



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
Route::controller(RegisterController::class)->group(function () {
    Route::post('register', 'register');
    Route::get('register', 'showRegistrationForm')->name('register');
    Route::get('register/getreportinglines/{id}', 'getReportingLines');
});

;

// User's Login
Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'showLoginForm')->name('login');
    Route::post('login', 'login');
    Route::post('logout', 'logout')->name('logout');
});


// requisition controller
Route::controller(RequisitionController::class)->group(function () {
    Route::get('/home', 'index')->name('home');
    Route::get('requisition', 'getCategories')->name('new_requisition');
    Route::get('requisition/getitems/{id}','getItems');
    Route::post('/create_new_requisition',  'store')->name('store_new_requisition');
    Route::get('requisition/{requisition}/delete_requisition', 'destroy')->name('delete_requisition');
});

//Site Head and team Lead Dashboard
Route::controller(ShTlController::class)->group(function () {
    Route::get('/sh', 'index');
    Route::get('requisition/{requisition}/sh_tl_approve_requisition', 'shTlApproval')->name('sh_tl_approve_requisition');
    Route::get('requisition/{requisition}/sh_tl_reject_requisition', 'shTlRejection')->name('sh_tl_reject_requisition');
    Route::get('/sh_tl_approved', 'shTlApproved')->name('sh_tl_approved');
    Route::get('/sh_tl_rejected', 'shTlRejected')->name('sh_tl_rejected');
});

;


// Manager Dashboard
Route::controller(ManagerController::class)->group(function () {
    Route::get('/manager', 'index');
    Route::get('requisition/{requisition}/manager_approve_requisition', 'managerApproval')->name('manager_approve_requisition');
    Route::get('requisition/{requisition}/manager_reject_requisition', 'managerRejection')->name('manager_reject_requisition');
    Route::get('/manager_approved', 'ManagerApproved')->name('manager_approved');
    Route::get('/manager_rejected', 'ManagerRejected')->name('manager_rejected');
});

// IC Dashboard
Route::controller(IcController::class)->group(function () {
    Route::get('/ic', 'index');
    Route::get('requisition/{requisition}/ic_approve_requisition', 'icApproval')->name('ic_approve_requisition');
    Route::get('requisition/{requisition}/ic_reject_requisition', 'icRejection')->name('ic_reject_requisition');
    Route::get('/ic_approved', 'icApproved')->name('ic_approved');
    Route::get('/ic_rejected', 'icRejected')->name('ic_rejected');
    
});

// Store Dashboard
Route::controller(StoreController::class)->group(function () {
    Route::get('/store', 'index');
    Route::get('/store_action', 'storeProcess')->name('store_action');
    Route::get('/store_processed', 'storeProcessed')->name('store_processed');
    Route::get('/item', 'allItem')->name('create_item');
    Route::get('/all_items', 'allItem')->name('item');
    Route::post('/new_item', 'store')->name('store_new_item');
    Route::get('/item/{item}/update_item', 'update')->name('update_item');
    Route::get('/reorder', 'reorder')->name('reorder');
    Route::get('/stock_out', 'stockOut')->name('stock_out');
});
