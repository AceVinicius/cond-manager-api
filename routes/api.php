<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Area\AreaController;
use App\Http\Controllers\Area\AreaDisabledDayController;
use App\Http\Controllers\Area\ReservationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\UnauthorizedController;
use App\Http\Controllers\Auth\ValidateController;
use App\Http\Controllers\Cond\DocumentController;
use App\Http\Controllers\Cond\LostNFoundController;
use App\Http\Controllers\Cond\UserController;
use App\Http\Controllers\Cond\WallController;
use App\Http\Controllers\Cond\WallLikeController;
use App\Http\Controllers\PingController;
use App\Http\Controllers\Unit\BilletController;
use App\Http\Controllers\Unit\WarningController;

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
    Route::post('validate', ValidateController::class);
});

Route::apiResource('areas', AreaController::class);
Route::apiResource('documents', DocumentController::class);
Route::apiResource('users', UserController::class);
Route::apiResource('walls', WallController::class);
Route::apiResource('units.billets', BilletController::class);
Route::apiResource('units.reservations', ReservationController::class);
Route::apiResource('units.warnings', WarningController::class);
Route::apiResource('lost-n-found', LostNFoundController::class);
Route::post('walls/{wall}/like', WallLikeController::class);
Route::get('reservation/{area}/disabled-days', [AreaDisabledDayController::class, 'getDays']);
Route::get('reservation/{area}/available-times', [AreaDisabledDayController::class, 'getTimes']);
Route::post('warning/file', [WarningController::class, 'file']);
