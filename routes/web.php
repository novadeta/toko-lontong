<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpenseLogController;
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


Route::middleware('auth')->group(function (){
Route::get('/', [ProductController::class,'dashboard'])->name('dashboard');


Route::name('product.')->prefix('produk')->group(function (){
    Route::controller(ProductController::class)->group(function () {
        Route::get('/','index')->name('index');
        Route::get('/search','search')->name('search');
        Route::get('/tambah','create')->name('create');
        Route::post('/store','store')->name('store');
        Route::get('/{id}','edit')->name('edit');
        Route::put('/{id}','update')->name('update');
        Route::delete('/{id}','delete')->name('delete');
    });

});
Route::name('buying.')->prefix('penjualan')->group(function (){
    Route::controller(TransactionsController::class)->group(function () {
        Route::get('/','index')->name('index');
        Route::get('/tambah-penjualan','create')->name('create');
        Route::post('/penjualan','store')->name('store');
        Route::get('/penjualan/{id}','edit')->name('edit');
        Route::put('/penjualan/{id}','update')->name('update');
        Route::delete('/penjualan/{id}','delete')->name('delete');
        Route::put('/hutang/{debt}','updateDebt')->name('debt.update');
        Route::delete('/hutang/{debt}','deleteDebt')->name('debt.delete');
    });
});

Route::name('shopping.')->prefix('belanja')->group(function (){
    Route::controller(ExpenseLogController::class)->group(function () {
        Route::get('/','index')->name('index');
        Route::get('/tambah-belanja','create')->name('create');
        Route::post('/','store')->name('store');
        Route::get('/{id}','edit')->name('edit');
        Route::put('/{id}','UPDATE')->name('update');
        Route::delete('/{id}','delete')->name('delete');
    });
});

Route::name('report.')->group(function (){
    Route::controller(ExpenseLogController::class)->group(function () {
        Route::get('/laporan-pemasukan','getIncome')->name('income');
        Route::get('/laporan-pengeluaran','getExpense')->name('expense');
        Route::get('/export-pemasukan','exportIncome')->name('exportIncome');
        Route::get('/export-pengeluaran','exportExpense')->name('exportExpense');
    });
});

Route::name('dashboard.')->group(function (){
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/get-top-product','getTopProduct')->name('getTopProduct');
        Route::get('/get-recap-revenue','getRecapRevenue')->name('getRecapRevenue');
        Route::get('/get-comparison','getComparison')->name('getComparison');
    });
});

});
Route::get('login', function () {
    return view('auth.login');
})->name('login');

Route::post('authenticate',[UserController::class,'authenticate'])->name('authenticate');
Route::get('logout',[UserController::class,'logout'])->name('logout');