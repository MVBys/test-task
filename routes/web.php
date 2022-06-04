<?php

use App\Http\Controllers\ActiveSubstanceController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\MedicinalProductController;
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

Route::resource('substance', ActiveSubstanceController::class);
Route::resource('manufacturer', ManufacturerController::class);
Route::resource('product', MedicinalProductController::class);
