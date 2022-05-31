<?php

use App\Http\Controllers\ActiveSubstanceController;
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

    // dd(collect(Route::getRoutes())[1]->uri);
    foreach (collect(Route::getRoutes()) as $url) {
        echo '
            <h3>
                ' . $url->uri . '
            <h3/>
        ';

    }
});

Route::resource('substance', ActiveSubstanceController::class);
