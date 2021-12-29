<?php

use App\Http\Controllers\CrawlController;
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
//Route::get('/', [CrawlController::class, 'getNumberInfection']);
//Route::get('/', [CrawlController::class, 'getSumInfectionAndDead']);
//Route::get('/', [CrawlController::class, 'getVaccine']);
Route::get('/', [CrawlController::class, 'index']);
