<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Auth\Events\Login;
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


// Route::get('/', function () {
//     return view('welcome');
// });

// // Rute untuk menampilkan halaman login (GET)
Route::get('/login', [AuthController::class, 'loginform'])->name('login');
// // Rute untuk menangani permintaan login (POST)
Route::post('/login', [AuthController::class, 'login']);
//admin
Route::get('/admin', [AdminController::class, 'homeadmin'])->name('admin.dashboard');

// Rute untuk menampilkan halaman tambah (GET)
Route::get('/tambah', [AdminController::class, 'tambahform'])->name('tambah');
// Rute untuk menangani permintaan tambah (POST)
Route::post('/tambah', [AdminController::class, 'tambah']);
//edit
Route::get('/edit/{id}', [AdminController::class, 'formedit'])->name('formedit');
Route::post('/edit/{id}', [AdminController::class, 'edit'])->name('edit');

//delete
Route::delete('/hapus/{id}', [AdminController::class, 'hapus'])->name('hapus');

//logout
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout'])->name('logout');

//home
Route::get('/',[AdminController::class, 'home'])->name('home');