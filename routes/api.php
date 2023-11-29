<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controller\UserController;
use App\Http\Controller\RsController;
use App\Http\Controller\PasienController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/masuk', [UserController::class, 'loginApi']);

Route::post('/create-rs', [RsController::class, 'storeRsApi'])->middleware('auth:sanctum');
Route::delete('delete-rs/{rs}', [RsController::class, 'deleteRsApi'])->middleware('auth:sanctum', 'can:delete,rs');

Route::post('/create-pasien', [PasienController::class, 'storePasienApi'])->middleware('auth:sanctum');
Route::delete('delete-pasien/{pasien}', [PasienController::class, 'deletePasienApi'])->middleware('auth:sanctum', 'can:delete,pasien');
