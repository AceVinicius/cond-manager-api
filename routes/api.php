<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\UnauthorizedController;
use App\Http\Controllers\Cond\UserController;
use App\Http\Controllers\PingController;

use App\Models\User;

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

Route::get('ping', PingController::class);

Route::prefix('auth')->group(function () {
    Route::get('unauthorized', UnauthorizedController::class)->name('login');
    Route::post('login', LoginController::class);
    Route::post('logout', LogoutController::class);
});

Route::post('users', [UserController::class, 'store'])->name('users.store');
// Route::apiResource('users', UserController::class);
