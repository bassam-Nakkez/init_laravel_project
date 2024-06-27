<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Broadcast;
use App\Http\Controllers\ImageUploadController;


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
//Broadcast::routes(['middleware' => ['auth:other']]);


//Broadcast::routes(['middleware' => ['changeHeaderName','auth:other']]);
Route::post('/upload', ImageUploadController::class);



// api/broadcasting/auth 

//Broadcast::routes(['middleware' => ['changeHeaderName','auth:sanctum']]);
