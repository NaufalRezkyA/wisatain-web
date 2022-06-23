<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ApiCustomerController;
use App\Http\Controllers\ApiWisataController;
use App\Http\Controllers\ApiTransaksiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// auth


Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::post('/signup', [ApiController::class, 'store']);

//wisata



Route::post('/insertwisata', [ApiWisataController::class,'insertwisata']);

Route::get('/showwisata/{id}', [ApiWisataController::class,'showwisata']);


Route::put('/updatewisata/{id}', [ApiWisataController::class,'updatewisata']);
Route::delete('/deletewisata/{id}', [ApiWisataController::class,'deletewisata']);

//customer
Route::get('/admin-customer', [ApiCustomerController::class,'index'])->name('customer');



Route::post('/insertcustomer', [ApiCustomerController::class,'insertcustomer']);

Route::get('/showcustomer/{id}', [ApiCustomerController::class,'showcustomer']);


Route::put('/updatecustomer/{id}', [ApiCustomerController::class,'updatecustomer']);
Route::delete('/deletecustomer/{id}', [ApiCustomerController::class,'deletecustomer']);

//admin
Route::post('/updateAdmin', [AdminController::class,'updateinfo']);
Route::delete('/deleteAdmin', [AdminController::class,'deleteinfo']);
Route::get('/admin-datatransaksi', [TransactionController::class,'index'])->middleware('auth');


//transaksi

// Route::get('/admin-datatransaksi', function () {
//     return view('datatransaksi');
// });



Route::put('/updatetransaksi/{id}', [ApiTransaksiController::class,'updatecustomer']);
Route::delete('/deletetransaksi/{id}', [ApiTransaksiController::class,'deletecustomer']);

//login api
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/get_profile', [ApiCustomerController::class,'getProfile']);
    Route::post('/insert_transaksi/{id}', [ApiTransaksiController::class,'createTransaction']);
    Route::get('/show_history', [ApiTransaksiController::class,'historyTransaction']);
    Route::get('/customer_logout', [ApiCustomerController::class, 'logout']);
});
Route::post('/admin_login', [ApiController::class,'auth']);
Route::get('/admin-wisata', [ApiWisataController::class,'index'])->name('wisata');
Route::post('/customer_login', [ApiCustomerController::class,'auth']);
