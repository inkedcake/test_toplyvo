<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::prefix('/substance')->group(function (){
    Route::get('/',['substance'=>'SubstanceController@get']);
});
Route::prefix('/manufacturer')->group(function (){
    Route::get('/',['manufacturer'=>'ManufacturerController@get']);
});
Route::prefix('/medicine')->group(function (){
    Route::get('/',['medicine'=>'MedicineController@get']);
    Route::get('/{medicine_id}',['medicine'=>'MedicineController@detail'])->where(['medicine_id'=>'[0-9+]']);
    Route::post('/',['medicine'=>'MedicineController@create']);
    Route::put('/{medicine_id}',['medicine'=>'MedicineController@update'])->where(['medicine_id'=>'[0-9+]']);
    Route::delete('/{medicine_id}',['medicine'=>'MedicineController@delete'])->where(['medicine_id'=>'[0-9+]']);

});