<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyControllers\AddEmployeeController;
use App\Http\Controllers\CompanyControllers\CompanyLoginController;
use App\Http\Controllers\UserControllers\ShowTravelDetailsControllers;
use App\Http\Controllers\CompanyControllers\PostsManagement\ViewPostsController;
use App\Http\Controllers\CompanyControllers\PostsManagement\CreatePostController;
use App\Http\Controllers\CompanyControllers\PostsManagement\DeletePostController;

use App\Http\Controllers\CompanyControllers\PostsManagement\UpdatePostController;
use App\Http\Controllers\CompanyControllers\SeriesManagement\ViewSeriesController;
use App\Http\Controllers\CompanyControllers\SeriesManagement\CreateSeriesController;
use App\Http\Controllers\CompanyControllers\StationManagementControllers\AddStationController;
use App\Http\Controllers\CompanyControllers\FeaturesManagementControllers\AddFeatureController;
use App\Http\Controllers\CompanyControllers\TravelsManagementControllers\ViewTravelsController;
use App\Http\Controllers\CompanyControllers\TravelsManagementControllers\CreateTravelController;
use App\Http\Controllers\CompanyControllers\FeaturesManagementControllers\ViewFeaturesController;
use App\Http\Controllers\CompanyControllers\StationManagementControllers\DeleteStationController;
use App\Http\Controllers\CompanyControllers\StationManagementControllers\UpdateStationController;
use App\Http\Controllers\CompanyControllers\FeaturesManagementControllers\DeleteFeatureController;
use App\Http\Controllers\CompanyControllers\FeaturesManagementControllers\UpdateFeatureController;
use App\Http\Controllers\CompanyControllers\TravelsManagementControllers\GetTravelsByFiltersControllers;
use App\Http\Controllers\CompanyControllers\ReservationManagementControllers\CompanyReservationController;
use App\Http\Controllers\CompanyControllers\ReservationManagementControllers\GetTravelMatrixWebController;

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


// $admin = Auth::guard('admin')->user();
// $token = $admin->createToken('AdminToken', ['admin'])->accessToken;


Route::post('login',CompanyLoginController::class);


Route::middleware('changeHeaderName','auth:other')->group(function () {

    Route::get('test',function (){
        return response()->json('hi from server'); 
    });


 //---------------------- Employees Management -----------------------

 Route::prefix('employee')->group(function () {
    Route::post('add',AddEmployeeController::class);
});

//---------------------- Programs Management -----------------------

//  Route::prefix('program')->group(function () {
//     Route::post('create',CreateProgramController::class);
// });

//---------------------- Travels Management -----------------------

Route::prefix('travel')->group(function () {
    Route::post('create',CreateTravelController::class);
    Route::get('view',ViewTravelsController::class);
    Route::get('GetTravelsByFilters',GetTravelsByFiltersControllers::class);





});

//---------------------- Stations Management -----------------------

Route::prefix('station')->group(function () {
    Route::post('add',AddStationController::class);
    Route::post('delete',DeleteStationController::class);
    Route::post('update',UpdateStationController::class);
});


//---------------------- Features Management -----------------------

Route::prefix('feature')->group(function () {
    Route::post('add',AddFeatureController::class);
    Route::post('delete',DeleteFeatureController::class);
    Route::post('update',UpdateFeatureController::class);
    Route::Get('view',ViewFeaturesController::class);

});

//---------------------- Series Management -----------------------

Route::prefix('series')->group(function () {
    Route::post('create',CreateSeriesController::class);
    Route::Get('view',ViewSeriesController::class);
});

//---------------------- Posts Management -----------------------

Route::prefix('post')->group(function () {
    Route::post('create',CreatePostController::class);
    Route::get('view',ViewPostsController::class);
    Route::post('delete',DeletePostController::class);
    Route::post('update',UpdatePostController::class);

});

//---------------------- Reservation Management -----------------------

Route::prefix('reservation')->group(function () {
    Route::post('create',CompanyReservationController::class);
});


//---------------------- Getters -----------------------

Route::prefix('get')->group(function () {
    Route::get('travel/details',ShowTravelDetailsControllers::class);
    Route::get('travel/matrix',GetTravelMatrixWebController::class);

});

});