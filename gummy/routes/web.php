<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Suppliercontroller;
use App\Http\Controllers\BarangmasukController;
use App\Http\Controllers\BarangkeluarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\Detail_PenjualanController;
use App\Http\Controllers\StrukController;
use App\Models\Barangmasuk;

use GuzzleHttp\Middleware;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
/*Pengaturan Menu*/

//Route::get('/', [LayoutController::class, 'index'])->middleware('auth');

/* Management Login Bos */

Route::group(['middleware' => ['auth']], function () {

    /* admin */
    //(bug) Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['auth']], function () {
        /*['auth',  'CekUserLogin:1'] */
        /*User Group*/
        Route::get('/user', [UserController::class, 'index']);
        Route::get('/user/create', [UserController::class, 'create']);
        Route::post('/user/simpan', [UserController::class, 'simpan']);
        Route::get('/user/{id}/edit', [UserController::class, 'edit']);
        Route::put('/user/{id}', [UserController::class, 'update']);
        Route::get('/user/{id}/editPassword', [UserController::class, 'editPassword']);
        Route::put('/updatePassword{id}', [UserController::class, 'updatePassword']);
        Route::delete('/user/{id}', [UserController::class, 'destroy']);

        /* Suplier grup */
        Route::get('/supplier', [SupplierController::class, 'index']);
        Route::get('/supplier/create', [SupplierController::class, 'create']);
        Route::post('/supplier/simpan', [SupplierController::class, 'simpan']);
        Route::get('/supplier/{id}/edit', [SupplierController::class, 'edit']);
        Route::put('/supplier/{id}', [SupplierController::class, 'update']);
        Route::delete('/supplier/{id}', [SupplierController::class, 'destroy']);

        /*Costumer Grup*/
        Route::get('/customer', [CustomerController::class, 'index']);
        Route::get('/customer/create', [CustomerController::class, 'create']);
        Route::post('/customer/simpan', [CustomerController::class, 'simpan']);
        Route::get('/customer/{id}/edit', [CustomerController::class, 'edit']);
        Route::put('/customer/{id}', [CustomerController::class, 'update']);
        Route::delete('/customer/{id}', [CustomerController::class, 'destroy']);

        /*Barang Grup*/
        Route::get('/barang', [BarangController::class, 'index']);
        Route::get('/barang/print', [BarangController::class, 'print']);
        Route::get('/barang/create', [BarangController::class, 'create']);
        Route::post('/barang/simpan', [BarangController::class, 'simpan']);
        Route::get('/barang/{id}/edit', [BarangController::class, 'edit']);
        Route::put('/barang/{id}', [BarangController::class, 'update']);
        Route::delete('/barang/{id}', [BarangController::class, 'destroy']);
        /*laporan*/
        Route::get('laporanbarang', [BarangController::class, 'laporanbarang']);

        /*Barang Masok Grup*/
        Route::get('/barang_masuk', [BarangmasukController::class, 'index']);
        Route::get('/barang_masuk/create', [BarangmasukController::class, 'create']);
        Route::post('/barang_masuk/simpan', [BarangmasukController::class, 'simpan']);
        Route::get('/barang_masuk/{id}/edit', [BarangmasukController::class, 'edit']);
        Route::put('/barang_masuk/{id}', [BarangmasukController::class, 'update']);
        Route::delete('/barang_masuk/{id}', [BarangmasukController::class, 'destroy']);
        Route::get('generatepdf', [BarangmasukController::class, 'generatepdf'])->name('barangmasuk.pdf');
        /*laporan*/
        Route::get('/laporanbarangmasuk', [BarangmasukController::class, 'laporanbarangmasuk']);

        /*Barang keluar {Retur} Grup*/
        Route::get('/retur', [BarangkeluarController::class, 'index']);
        Route::get('/retur/create', [BarangkeluarController::class, 'create']);
        Route::post('/retur/simpan', [BarangkeluarController::class, 'simpan']);
        Route::delete('/retur/{id}', [BarangkeluarController::class, 'destroy']);
        /*laporan */
        Route::get('laporanbarangkeluar', [BarangkeluarController::class, 'laporanbarangkeluar']);

        /*Satuan grup*/
        Route::get('/satuan', [SatuanController::class, 'index']);
        Route::get('/satuan/create', [SatuanController::class, 'create']);
        Route::post('/satuan/simpan', [SatuanController::class, 'simpan']);
        Route::get('/satuan/{id}/edit', [SatuanController::class, 'edit']);
        Route::put('/satuan/{id}', [SatuanController::class, 'update']);
        Route::delete('/satuan/{id}', [SatuanController::class, 'destroy']);

        /*Kategori grup*/
        Route::get('/kategori', [KategoriController::class, 'index']);
        Route::get('/kategori/create', [KategoriController::class, 'create']);
        Route::post('/kategori/simpan', [KategoriController::class, 'simpan']);
        Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit']);
        Route::put('/kategori/{id}', [KategoriController::class, 'update']);
        Route::delete('/kategori/{id}', [KategoriController::class, 'destroy']);

        /* dashboard punya selera */
        Route::get('/', [DashboardController::class, 'index']);

        /* penjualan */
        Route::get('/penjualan', [SalesController::class, 'index']);
        Route::Post('/penjualan/simpan', [SalesController::class, 'simpan']);
        Route::get('/penjualan/struk', [SalesController::class, 'struk']);
        Route::delete('/penjualan/{id}', [SalesController::class, 'destroy']);

        /*- Detail Laporan*/
        Route::get('/detail', [SalesController::class, 'det']);
    });

    /*kasir*/
    Route::group(['middleware' => ['auth']], function () {
        /* dashboard punya selera */
        Route::get('/', [DashboardController::class, 'index']);

        /* penjualan */
        Route::get('/penjualan', [SalesController::class, 'index']);
        Route::Post('/penjualan/simpan', [SalesController::class, 'simpan']);
        Route::get('/penjualan/struk', [SalesController::class, 'struk']);

        /*Costumer Grup*/
        Route::get('/customer', [CustomerController::class, 'index']);
        Route::get('/customer/create', [CustomerController::class, 'create']);
        Route::post('/customer/simpan', [CustomerController::class, 'simpan']);
        Route::get('/customer/{id}/edit', [CustomerController::class, 'edit']);
        Route::put('/customer/{id}', [CustomerController::class, 'update']);
        Route::delete('/customer/{id}', [CustomerController::class, 'destroy']);

        // Route::resource('/dashboard', DashboardController::class);
        // Route::resource('/penjualan', SalesController::class);
        // Route::resource('/customer', CustomerController::class);
    });
});



/*Login Punya Gaya */
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login/proses', 'proses');
    Route::get('/logout', 'keluar');
});
Route::get('/register', [RegisterController::class, 'index']);
Route::get('/register', [RegisterController::class, 'simpan']);

// Route::get('/struk', [StrukController::class, 'index']);

Route::get('detailPenjualan', [Detail_PenjualanController::class, 'index']);
Route::get('laporanjual', [Detail_penjualanController::class, 'laporan']);
Route::get('laporanjual/detail', [Detail_penjualanController::class, 'detail']);

// Route::get('laporanbarangkeluar', [Detail_penjualanController::class, 'laporanbarangkeluar']);


//Route::get('/login', [LoginController::class, 'index'])->name('login');
//Route::post('/login', [LoginController::class, 'proses']);

/*penting*/
// Route::group(['Middleware' => ['auth']], function () {
//     Route::group(['middleware' => ['CekUserLogin:1']], function () {
//         Route::resource('/', DashboardController::class);
//     });
//     Route::group(['middleware' => ['CekUserLogin:2']], function () {
//         Route::resource('/penjualan', SalesController::class);
//     });
// });



// /*simpen dulu*/
// Route::get('/login1', [ButhController::class, 'index'])->name('login1');
// Route::post('/login1', [ButhController::class, 'authlogin']);


/*login yang di buat pake node Js */
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
