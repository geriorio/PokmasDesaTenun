<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfitController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BarangJualController;
use App\Http\Controllers\ExpenditureController;
use App\Http\Middleware\AdminMiddleware;

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

Route::get('/', [BarangJualController::class, 'viewHome'])->name('user.home');
Route::get('/home', [BarangJualController::class, 'viewHome'])->name('user.homepage');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'logins'])->name('login.store');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register', [LoginController::class, 'store'])->name('register.store');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/orderselesai', [OrderController::class, 'viewOrderSelesai'])->name('orderselesai');
Route::get('/add-to-cart/{id}', [BarangJualController::class, 'addToCart'])->name('add-cart');
Route::post('/cart/update', [BarangJualController::class, 'updateQty'])->name('update-qty');
Route::get('/cart', [BarangJualController::class, 'viewCart'])->name('cart');
Route::get('/delete-from-cart/{id}', [BarangJualController::class, 'deleteFromCart'])->name('delete-from-cart');
Route::get('/barang', [BarangJualController::class, 'viewCatalog'])->name('milih-barang');
Route::get('/detail-barang/{barang}', [BarangJualController::class, 'viewDetail'])->name('detail-barang');

Route::get('/riwayat', [OrderController::class, 'viewHistory'])->name('history');
Route::get('/riwayatdetail/{id}', [OrderController::class, 'history_detail'])->name('historydetail');
Route::get('/fetch-customer', [OrderController::class, 'fetchCustomer'])->name('fetch.customer');

Route::get('/detail-payment', [BarangJualController::class, 'viewCartPayment'])->name('detail-payment');
Route::post('/', [OrderController::class, 'storeKatalog'])->name('katalog.store');


Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth');

Route::prefix('admin')->middleware(AdminMiddleware::class)->group(function () {
    Route::get('/', [AdminController::class, 'viewKategori'])->name('viewKategori');
    Route::prefix('kategori')->group(function () {
        Route::get('/', [AdminController::class, 'viewKategori'])->name('viewKategori');
        Route::post('/', [AdminController::class, 'store'])->name('kategori.store');
        Route::put('/{id}', [AdminController::class, 'updatenama'])->name('kategori.update');
        Route::delete('/{id}', [AdminController::class, 'destroy'])->name('kategori.destroy');
    });
    Route::prefix('inventory')->group(function () {
        Route::get('/', [AdminController::class, 'viewInventory'])->name('viewInventory');
        Route::post('/', [AdminController::class, 'storeInventory'])->name('inventory.store');
        Route::delete('/{id}', [AdminController::class, 'destroyInventory'])->name('inventory.delete');
        Route::put('/{id}', [AdminController::class, 'updateInventory'])->name('inventory.update');
    });
    Route::prefix('supplier')->group(function () {
        Route::get('/', [SupplierController::class, 'viewSupplier'])->name('viewSupplier');
        Route::post('/', [SupplierController::class, 'store'])->name('supplier.store');
        Route::put('/{id}', [SupplierController::class, 'update'])->name('supplier.update');
        Route::delete('/{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy');
    });
    Route::prefix('customer')->group(function () {
        Route::get('/', [CustomerController::class, 'viewCustomer'])->name('viewCustomer');
        Route::put('/{id}', [CustomerController::class, 'update'])->name('customer.update');
        Route::delete('/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');
    });
    Route::prefix('/order')->group(function () {
        Route::get('/', [OrderController::class, 'viewOrder'])->name('viewOrder');
        Route::post('/req', [OrderController::class, 'storeRequest'])->name('order.request');
        Route::post('/', [OrderController::class, 'store'])->name('order.store');
        Route::get('/detail/{order}', [OrderController::class, 'detailOrder'])->name('order.detail');
        Route::put('/acceptOrder/{order}', [OrderController::class, 'acceptOrder'])->name('acceptOrder');
        Route::put('/declineOrder/{order}', [OrderController::class, 'declineOrder'])->name('declineOrder');
        Route::put('/doneOrder/{order}', [OrderController::class, 'DoneOrder'])->name('DoneOrder');
        Route::put('/validateOrder/{order}', [OrderController::class, 'validateOrder'])->name('validateOrder');
    });

    Route::prefix('purchasing')->group(function () {
        Route::get('/', [PurchaseController::class, 'index'])->name('purchase.index');
        Route::get('/products-by-supplier/{supplier_id}', [PurchaseController::class, 'getProductsBySupplier']);
        Route::post('/store', [PurchaseController::class, 'store'])->name('purchase.store');
        Route::delete('/delete/{purchase:id}', [PurchaseController::class, 'delete'])->name('purchase.delete');
        Route::put('/update/{purchase:id}', [PurchaseController::class, 'update'])->name('purchase.update');
        Route::put('/accept/{purchase:id}', [PurchaseController::class, 'accept'])->name('purchase.accept');
    });

    Route::prefix('catalog')->group(function () {
        Route::get('/', [ProductController::class, 'catalog'])->name('view.catalog');
        Route::post('/', [ProductController::class, 'catalogstore'])->name('catalog.store');
        Route::get('/{id}/edit', [ProductController::class, 'edits'])->name('catalog.edit');
        Route::put('/{id}', [ProductController::class, 'Catalogupdate'])->name('catalog.update');
        Route::delete('/{id}', [ProductController::class, 'deletecatalog'])->name('catalog.delete');
    });

    Route::prefix('expenditure')->group(function () {
        Route::get('/', [ExpenditureController::class, 'viewExpenditure'])->name('viewExpenditure');
        Route::post('/', [ExpenditureController::class, 'storeExpenditure'])->name('expenditure.store');
        Route::delete('/{id}', [ExpenditureController::class, 'destroy'])->name('expenditure.destroy');
        Route::put('/{id}', [ExpenditureController::class, 'updateExpenditure'])->name('expenditure.update');
    });

    Route::prefix('labarugi')->name('labarugi.')->group(function () {
        Route::get('/', [ProfitController::class, 'index'])->name('index');
        Route::get('/{month}', [ProfitController::class, 'show'])->name('show');
    });
});
