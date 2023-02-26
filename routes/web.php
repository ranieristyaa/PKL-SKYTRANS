<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\DataAvStockController;
use App\Http\Controllers\DataAvStockAdminController;
use App\Http\Controllers\DataMgStockController;
use App\Http\Controllers\DataMgStockAdminController;
use App\Http\Controllers\DataAvMutationController;
use App\Http\Controllers\DataMgMutationController;
use App\Http\Controllers\DataAvRentalController;
use App\Http\Controllers\DataAvPurchaseController;
use App\Http\Controllers\DataMgPurchaseController;
use App\Http\Controllers\LogAktivitasController;
use App\Http\Controllers\DataAvRentalAdminController;
use App\Http\Controllers\DataAvPurchaseAdminController;
use App\Http\Controllers\DataMgPurchaseAdminController;
use App\Http\Controllers\DataAvMutationAdminController;
use App\Http\Controllers\DataMgMutationAdminController;
use App\Http\Controllers\LogAktivitasAdminController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\LogAllUserController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\PengaturanAdmController;


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
    return view('auth.home');
});

// untuk superadmin dan pegawai
Route::group(['middleware' => ['auth', 'checkrole:1,2,3']], function() {
    Route::get('/redirect', [RedirectController::class, 'cek']);
});


// untuk superadmin
Route::group(['middleware' => ['auth', 'checkrole:1']], function() {
    Route::get('/superadmin/home', [SuperAdminController::class, 'index']);
    
});

Route::prefix('superadmin')->group(function () {
    Route::middleware(['auth', 'checkrole:1'])->group(function(){
        Route::get('/dataadmin', [DataUserController::class, 'index']);
        //Route::delete('/dataadmin/{id}', [DataUserController::class, 'destroy'])->name('users.destroy');
        Route::get('/stock/aviasi', [DataAvStockController::class, 'index']);
        Route::get('/stock/migas', [DataMgStockController::class, 'index']);
        Route::get('/mutasi/aviasi', [DataAvMutationController::class, 'index']);
        Route::get('/mutasi/migas', [DataMgMutationController::class, 'index']);
        Route::get('/rental', [DataAvRentalController::class, 'index']);
        Route::get('/pembelian/aviasi', [DataAvPurchaseController::class, 'index']);
        Route::get('/pembelian/migas', [DataMgPurchaseController::class, 'index']);
        Route::resource('/dataadmin', DataUserController::class, ['parameters' => ['dataadmin' => 'user']]);
        Route::resource('/stock/aviasi', DataAvStockController::class, ['parameters' => ['aviasi' => 'stock']]);
        Route::resource('/stock/migas', DataMgStockController::class, ['parameters' => ['migas' => 'stock']]);
        Route::resource('/pembelian/aviasi', DataAvPurchaseController::class, ['parameters' => ['aviasi' => 'purchase']]);
        Route::resource('/pembelian/migas', DataMgPurchaseController::class, ['parameters' => ['migas' => 'purchase']]);
        Route::resource('/mutasi/aviasi', DataAvMutationController::class, ['parameters' => ['aviasi' => 'mutation']]);
        Route::resource('/mutasi/migas', DataMgMutationController::class, ['parameters' => ['migas' => 'mutation']]);
        Route::resource('/rental', DataAvRentalController::class, ['parameters' => ['rental' => 'rental']]);
        Route::get('/log', [LogAktivitasController::class, 'index']);
        Route::get('/proyek', [ProyekController::class, 'index']);
        Route::get('/log_all_user', [LogAllUserController::class, 'index']);
        Route::get('/pengaturan_akun', [PengaturanController::class, 'index']);
        Route::post('/pengaturan_akun', [PengaturanController::class, 'update']);
    });
});



// untuk pegawai
Route::group(['middleware' => ['auth', 'checkrole:2']], function() {
    Route::get('/admin/home', [AdminController::class, 'index']);

});

Route::prefix('admin')->group(function () {
    Route::middleware(['auth', 'checkrole:2'])->group(function(){
        //Route::delete('/dataadmin/{id}', [DataUserController::class, 'destroy'])->name('users.destroy');
        Route::get('/stock/aviasi', [DataAvStockAdminController::class, 'index']);
        Route::get('/stock/migas', [DataMgStockAdminController::class, 'index']);
        Route::get('/mutasi/aviasi', [DataAvMutationAdminController::class, 'index']);
        Route::get('/mutasi/migas', [DataMgMutationAdminController::class, 'index']);
        Route::get('/rental', [DataAvRentalAdminController::class, 'index']);
        Route::get('/pembelian/aviasi', [DataAvPurchaseAdminController::class, 'index']);
        Route::get('/pembelian/migas', [DataMgPurchaseAdminController::class, 'index']);
        Route::resource('/stock/aviasi', DataAvStockAdminController::class, ['parameters' => ['aviasi' => 'stock']]);
        Route::resource('/stock/migas', DataMgStockAdminController::class, ['parameters' => ['migas' => 'stock']]);
        Route::resource('/pembelian/aviasi', DataAvPurchaseAdminController::class, ['parameters' => ['aviasi' => 'purchase']]);
        Route::resource('/pembelian/migas', DataMgPurchaseAdminController::class, ['parameters' => ['migas' => 'purchase']]);
        Route::resource('/mutasi/aviasi', DataAvMutationAdminController::class, ['parameters' => ['aviasi' => 'mutation']]);
        Route::resource('/mutasi/migas', DataMgMutationAdminController::class, ['parameters' => ['migas' => 'mutation']]);
        Route::resource('/rental', DataAvRentalAdminController::class, ['parameters' => ['rental' => 'rental']]);
        Route::get('/log', [LogAktivitasAdminController::class, 'index']);
        Route::get('/pengaturan_akun', [PengaturanAdmController::class, 'index']);
        Route::post('/pengaturan_akun', [PengaturanAdmController::class, 'update']);
    });
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
