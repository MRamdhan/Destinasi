<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
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

// Rute untuk menampilkan halaman login (GET)
Route::get('/login', [AuthController::class, 'loginform'])->name('login');
// Rute untuk menangani permintaan login (POST)
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/',[AdminController::class, 'home'])->name('home');
Route::get('/admin', [AdminController::class, 'homeadmin'])->name('admin.dashboard');
Route::get('/tambah', [AdminController::class, 'tambah']);
Route::get('/edit', [AdminController::class, 'edit']);

