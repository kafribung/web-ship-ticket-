<?php

use App\Http\Controllers\API\Auth\{LoginController, LogoutController};
use App\Http\Controllers\API\Dash\{AdminConrtoller,  DashboardController};
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

Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::get('dashboard', DashboardController::class);
    // Admin
    Route::get('admin', [AdminConrtoller::class, 'index']);
    Route::post('admin', [AdminConrtoller::class, 'store']);
    Route::get('admin/{user:email}', [AdminConrtoller::class, 'show']);
    Route::patch('admin/{user:email}', [AdminConrtoller::class, 'update']);

    Route::post('logout', LogoutController::class);
});
Route::post('login', LoginController::class);
