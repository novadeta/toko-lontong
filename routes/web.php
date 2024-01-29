<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('contents.index');
});


Route::name('product.')->prefix('produk')->group(function (){
    Route::controller(ProductController::class)->group(function () {
        Route::get('/','index')->name('index');
        Route::post('/store','store')->name('store');
    });

});
Route::name('buying.')->prefix('pembelian')->group(function (){
    Route::controller(TransactionsController::class)->group(function () {
        Route::get('/','index')->name('index');
        Route::post('/pembelian','store')->name('store');
    });
});

Route::get('login', function () {
    return view('auth.login');
});
Route::post('authenticate',[UserController::class,'authenticate'])->name('user.authenticate');