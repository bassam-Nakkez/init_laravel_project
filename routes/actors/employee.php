<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserControllers\GetComanyTravelController;
use App\Http\Controllers\EmployeeControllers\EmployeeLoginController;
use App\Http\Controllers\EmployeeControllers\DriverControllers\SharePullmanLocationController;


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


Route::post('login',EmployeeLoginController::class);

Route::middleware('changeHeaderName','auth:other')->group(function () {

    Route::post('driver/sharePullmanLocation',SharePullmanLocationController::class);
    

});

 //-------
Route::group(["prefix"=>"driver","middleware"=>'auth:other'],function () {
        Route::get("get/travail",GetComanyTravelController::class);
});
