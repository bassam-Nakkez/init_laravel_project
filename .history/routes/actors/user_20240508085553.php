<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserControllers\UserLoginController;
use App\Http\Controllers\UserControllers\ShowCompanyController;
use App\Http\Controllers\UserControllers\RegisterUserController;
use App\Http\Controllers\UserControllers\ShowTravelDetailsControllers;
use App\Http\Controllers\UserControllers\SearchAndFilterTravelController;
use App\Http\Controllers\GetControllers\GetSelectorFilterTravelController;
use App\Http\Controllers\UserControllers\CompanyFollowController;
use App\Http\Controllers\UserControllers\CompanyRecommendedController;
use App\Http\Controllers\UserControllers\GetTravelMatrixController;
use App\Http\Controllers\UserControllers\ShowCompanyPostsController;

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




Route::post('login',UserLoginController::class);
Route::post('signup',RegisterUserController::class);



Route::get("search/travels/by/filters",SearchAndFilterTravelController::class);

Route::get("show/travel/details",ShowTravelDetailsControllers::class);

Route::get("view/companies",ShowCompanyController::class);

Route::get("company/posts",ShowCompanyPostsController::class);

Route::get("travel/getMatrix",GetTravelMatrixController::class)->middleware("auth:user");

Route::post("   ",GetTravelMatrixController::class)->middleware("auth:user");

Route::group(['prefix' => 'company' , "middleware" => "auth:user"],function (){

    Route::post("/follow",CompanyFollowController::class);

    Route::post("/recomanded",CompanyRecommendedController::class);

});