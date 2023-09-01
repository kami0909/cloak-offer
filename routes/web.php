<?php

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
Route::get('/', [\App\Http\Controllers\CloakController::class, 'index']);

Route::get('/{path}', [\App\Http\Controllers\CloakController::class, 'landing']);

Route::get('/payment/{path}', [\App\Http\Controllers\CloakController::class, 'payment']);

