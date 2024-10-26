<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;




use App\Http\Controllers\AuthController;

Route::middleware(['throttle:10,1'])->group(function () {
   
Route::post('login', [AuthController::class, 'login']); // Public route
//Route::get('total-transactions', [TransactionController::class, 'totalTransactions']);

});

Route::middleware(['jwt.auth'])->group(function () {
    Route::middleware('throttle:10,1')->apiResource('users', UserController::class);
    Route::get('total-transactions', [TransactionController::class, 'totalTransactions']);
    Route::post('logout', [AuthController::class, 'logout']); // Protected route
});