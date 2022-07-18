<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get(
    '/covid_statistics',
    [\App\Http\Controllers\CovidController::class, 'index']
)->name('covid');

Route::get(
    '/recovery',
    [\App\Http\Controllers\CovidController::class, 'statistics']
)->name('statistics');

