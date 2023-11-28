<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\RsController;

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
Route::get('/daftar', [UserController::class, 'daftar']);
Route::post('/daftar', [UserController::class, 'daftarbaru']);
Route::post('/masuk', [UserController::class, 'login']);

Route::get('/beranda', [BerandaController::class, 'beranda']);

Route::get('/rs',[RsController::class,'view']);
Route::post('/rs', [RsController::class, 'store']);
Route::get('/rs/{rs}/edit', [RsController::class, 'edit']);
Route::put('/rs/{rs}', [RsController::class, 'doupdate']);
Route::delete('/deleters/{rs}', [RsController::class,'delete']);