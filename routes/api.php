<?php

use App\Http\Controllers\PaketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

//SALES CONTROLLER API//
Route::get('/sales', [SalesController::class, 'index']);
Route::post('/sales_add', [SalesController::class, 'store']);
Route::put('/sales/{id}', [SalesController::class, 'update']);
Route::delete('/sales/{id}', [SalesController::class, 'destroy']);

//SALES CONTROLLER API//
Route::get('/paket', [PaketController::class, 'index']);
Route::post('/paket_add', [PaketController::class, 'store']);
Route::put('/paket/{id}', [PaketController::class, 'update']);
Route::delete('/paket/{id}', [PaketController::class, 'destroy']);



