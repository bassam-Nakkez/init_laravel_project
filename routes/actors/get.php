<?php

use App\Events\TestEvent;
use App\Events\bookingNotification;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GetControllers\GetCitiesController;
use App\Http\Controllers\GetControllers\GetTravelsSelectorsController;
use App\Http\Controllers\GetControllers\GetSelectorFilterTravelController;

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

Route::get('test',function(){
     return" Hi how are you ?" ;
})->middleware("myCros");

Route::get('cities',GetCitiesController::class);

Route::get("searchTravel/filters/selectors",GetSelectorFilterTravelController::class);

Route::get('send',function(){

    event(new TestEvent(" Hi bassam! ")) ;
    return"success" ;
});



Route::get('getTravelSelector',GetTravelsSelectorsController::class);


