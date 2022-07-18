<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CovidController;
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


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => ['auth:sanctum']], function () {
// private post routes
    Route::get('/covid_statistics', [CovidController::class, 'index_api'])->name('covid_api');
    Route::get('/recovery', [CovidController::class, 'statistics'])->name('statistics');

// logout
    Route::post('/logout', [AuthController::class, 'logout']);
});
//signup
Route::post('/signup', [AuthController::class, 'sign_up']);
Route::post('/login', [AuthController::class, 'login']);



