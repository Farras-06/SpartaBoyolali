<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DestinasiController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\KategoriExploreController;
use App\Http\Controllers\PesanController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/', 'HomeController@redirectAdmin')->name('index');

Route::get('/', [DestinasiController::class, 'home'])->name('home');
Route::get('register-pengunjung', [RegisterController::class, 'registerPengunjung'])->name('register');
Route::post('post-register', [RegisterController::class, 'registerStore'])->name('post-register');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('detail/{id}', [DestinasiController::class, 'show'])->name('detail');
/**
 * Admin routes
 */
Route::get('history', [PesanController::class, 'history'])->name('history');
Route::group(['prefix' => 'admin'], function () {
    Route::post('store-pesanan', [PesanController::class, 'storePesanan'])->name('store-pesanan');
    Route::get('beli-tiket/{id}', [DestinasiController::class, 'beliTiket'])->name('beli-tiket');
    Route::get('pesanan/{id}', [PesanController::class, 'pembayaran'])->name('pesanan');
    Route::post('set-bayar', [PesanController::class, 'bayar'])->name('set-bayar');

    Route::get('pesanan-list', [PesanController::class, 'listPesanan'])->name('pesanan-list');



    Route::get('/', 'Backend\DashboardController@index')->name('admin.dashboard');
    Route::get('/print', 'Backend\DashboardController@print')->name('admin.print');
    Route::get('/print-pengelola', 'Backend\DashboardController@printPengelola')->name('admin.printPengelola');
    Route::get('dashboard-pengelola', 'Backend\DashboardController@indexPengelola')->name('dashboard-pengelola');
    Route::get('dashboard-pengunjung', 'Backend\DashboardController@indexPengunjung')->name('dashboard-pengunjung');
    Route::resource('roles', 'Backend\RolesController', ['names' => 'admin.roles']);
    Route::resource('users', 'Backend\UsersController', ['names' => 'admin.users']);
    Route::resource('admins', 'Backend\AdminsController', ['names' => 'admin.admins']);
    
    Route::get('profile', 'Backend\DashboardController@profile')->name('profile');
    Route::post('profile-update/{id}', 'Backend\DashboardController@updateProfile')->name('profile-update');
    
    Route::get('destinasi-list', [DestinasiController::class, 'index'])->name('destinasi-list');
    Route::get('destinasi-create', [DestinasiController::class, 'create'])->name('destinasi-create');
    Route::post('destinasi-store', [DestinasiController::class, 'store'])->name('destinasi-store');
    Route::get('destinasi-edit/{id}', [DestinasiController::class, 'edit'])->name('destinasi-edit');
    Route::post('destinasi-update/{id}', [DestinasiController::class, 'update'])->name('destinasi-update');
    Route::get('destinasi-destroy/{id}', [DestinasiController::class, 'destroy'])->name('destinasi-destroy');


    Route::get('destinasi-galery/{id}', [DestinasiController::class, 'galery'])->name('destinasi-galery');
    Route::post('destinasi-galery-create', [DestinasiController::class, 'insertImageGalery'])->name('destinasi-galery-create');
    Route::post('destinasi-galery-update/{id}', [DestinasiController::class, 'updateImageGalery'])->name('destinasi-galery-update');
    Route::get('destinasi-galery-delete/{id}', [DestinasiController::class, 'deleteImageGalery'])->name('destinasi-galery-delete');

    Route::get('kategori-explore', [KategoriExploreController::class, 'index'])->name('kategori-explore');
    Route::post('kategori-explore-store', [KategoriExploreController::class, 'store'])->name('kategori-explore-store');
    Route::post('kategori-explore-update/{id}', [KategoriExploreController::class, 'update'])->name('kategori-explore-update');
    Route::get('kategori-explore-delete/{id}', [KategoriExploreController::class, 'destroy'])->name('kategori-explore-delete');

    Route::get('manage-explore/{id}', [KategoriExploreController::class, 'manageExplore'])->name('manage-explore');
    Route::post('manage-explore-store', [KategoriExploreController::class, 'storeManageExplore'])->name('manage-explore-store');
    Route::post('manage-explore-update/{id}', [KategoriExploreController::class, 'updateManageExplore'])->name('manage-explore-update');
    Route::get('manage-explore-delete/{id}', [KategoriExploreController::class, 'deleteManageExplore'])->name('manage-explore-delete');


    Route::get('event', [EventController::class, 'index'])->name('event');
    Route::post('event-store', [EventController::class, 'store'])->name('event-store');
    Route::post('event-update/{id}', [EventController::class, 'update'])->name('event-update');
    Route::get('event-delete/{id}', [EventController::class, 'destroy'])->name('event-delete');

    // Login Routes
    Route::get('/login', 'Backend\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login/submit', 'Backend\Auth\LoginController@login')->name('admin.login.submit');

    // Logout Routes       
    Route::post('/logout/submit', 'Backend\Auth\LoginController@logout')->name('admin.logout.submit');

    // Forget Password Routes
    Route::get('/password/reset', 'Backend\Auth\ForgetPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset/submit', 'Backend\Auth\ForgetPasswordController@reset')->name('admin.password.update');
});
