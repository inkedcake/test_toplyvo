<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\SubstanceController;
use App\Http\Controllers\ManufacturerController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
Medicine
Manufacturer
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post("login", "AuthController@login");
Route::post("register", "AuthController@register");

Route::group(["middleware" => "auth.jwt"], function () {
    Route::get("logout", "AuthController@logout");
    Route::prefix('/medicine')->group(function () {
        Route::get('/', [MedicineController::class, 'index']);
        Route::post('/create', [MedicineController::class, 'store']);
        Route::get('/show/{medicine}',[MedicineController::class, 'show']);
        Route::put('/update/{medicine}',[MedicineController::class, 'update']);
        Route::delete('/delete/{medicine}',[MedicineController::class, 'destroy']);
    });
    Route::get('/manufacturer', [ManufacturerController::class, 'index']);
    Route::get('/substance', [SubstanceController::class, 'index']);

});
