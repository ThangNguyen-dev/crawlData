<?php

use App\Http\Controllers\Api\NumberInjectionDateController;
use App\Http\Controllers\Api\VnexpressController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\VaccinatorController;

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

Route::group(['prefix' => 'v1'], function () {

    // get common infection
    Route::get('/gets', [VnexpressController::class, 'gets']);

    // route for vaccine
    Route::group(['prefix' => 'vaccine'], function () {
        Route::get('/provinces', [VaccinatorController::class, 'getProvinces']);
        Route::post('/province/detail', [VaccinatorController::class, 'getVaccinatorByProvince']);
    });

    // route for covid
    Route::group(['prefix' => 'covid'], function () {
        Route::get('/provinces', [NumberInjectionDateController::class, 'getProvinces']);
        Route::post('/province/detail', [NumberInjectionDateController::class, 'getProvinceDetail']);
    });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
