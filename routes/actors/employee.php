<?php

use App\Http\Models\Travel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserControllers\GetDriverTravelController;
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



});

//----------------------- Driver Department ---------------------------
 
Route::group(["prefix"=>"driver","middleware"=>['changeHeaderName','auth:other']],function () {
    
        Route::get("get/travels",GetDriverTravelController::class);
        Route::post('sharePullmanLocation',SharePullmanLocationController::class);

        // Route::get("get/travels",function(Request $request ){
        //     $companyId = $request['companyId'];
        //     $this->date = now();
        //     $date = date_format($this->date,"Y-m-d");
        //     return Travel::where('travelDate',"<=",$date)->limit(6)->get();
        // });
});
