<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\RsController;
use App\Http\Controllers\PasienController;

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
    return view('welcome');
})->middleware('guest');

// User
Route::get('/daftar', [UserController::class, 'daftar'])->middleware('guest');
Route::post('/daftar', [UserController::class, 'daftarbaru'])->middleware('guest');
Route::post('/masuk', [UserController::class, 'login'])->middleware('guest');
Route::post('/keluar', [UserController::class, 'logout'])->middleware('HarusMasuk');

// Dummy
Route::get('/beranda', [BerandaController::class, 'beranda'])->middleware('HarusMasuk');

// Rumah Sakit
Route::post('/rs', [RsController::class, 'store'])->middleware('HarusMasuk');
Route::get('/rs',[RsController::class,'view'])->middleware('HarusMasuk');
Route::get('/rs/{rs}/edit', [RsController::class, 'edit'])->middleware('HarusMasuk');
Route::put('/rs/{rs}', [RsController::class, 'doupdate'])->middleware('HarusMasuk');
Route::delete('/rs/{rs}/delete', [RsController::class,'delete'])->middleware('HarusMasuk');

// Pasien
Route::get('/pasien', [PasienController::class, 'view'])->middleware('HarusMasuk');
Route::get('/pasien/form', [PasienController::class, 'showform'])->middleware('HarusMasuk');
Route::post('/pasien', [PasienController::class, 'store'])->middleware('HarusMasuk');
Route::get('/pasien/{pasien}/edit', [PasienController::class, 'edit'])->middleware('HarusMasuk');
Route::put('/pasien/{pasien}', [PasienController::class, 'doupdate'])->middleware('HarusMasuk');
Route::delete('/pasien/{pasien}/delete', [PasienController::class, 'delete'])->middleware('HarusMasuk');

// Ajax
Route::post('/ajax/pasien/filter', [PasienController::class, 'ajaxfilter'])->middleware('HarusMasuk');