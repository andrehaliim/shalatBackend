<?php

use App\Http\Controllers\AdzanController;
use App\Http\Controllers\CityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::controller(CityController::class)->group(function () {
    Route::group(['prefix' => 'city'], function () {
        Route::get('/', 'index')->name('city.index');
    });
});
Route::controller(AdzanController::class)->group(function () {
    Route::group(['prefix' => 'adzan'], function () {
        Route::get('/{city}/{year}/{month}', 'index')->name('city.index');
    });
});
