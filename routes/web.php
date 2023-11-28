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
});

// User
Route::get('/daftar', [UserController::class, 'daftar']);
Route::post('/daftar', [UserController::class, 'daftarbaru']);
Route::post('/masuk', [UserController::class, 'login']);

// Dummy
Route::get('/beranda', [BerandaController::class, 'beranda']);

// Rumah Sakit
Route::get('/rs',[RsController::class,'view']);
Route::post('/rs', [RsController::class, 'store']);
Route::get('/rs/{rs}/edit', [RsController::class, 'edit']);
Route::put('/rs/{rs}', [RsController::class, 'doupdate']);
Route::delete('/rs/{rs}/delete', [RsController::class,'delete']);

// Pasien
Route::get('/pasien', [PasienController::class, 'view']);
Route::get('/pasien/form', [PasienController::class, 'showform']);
Route::post('/pasien', [PasienController::class, 'store']);
Route::get('/pasien/{pasien}/edit', [PasienController::class, 'edit']);
Route::put('/pasien/{pasien}', [PasienController::class, 'doupdate']);
Route::delete('/pasien/{pasien}/delete', [PasienController::class, 'delete']);