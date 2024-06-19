<?php

use App\Events\SeatAvailable;
use App\Events\NewMessageSent;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\publicRequests\LoginByEmailRequest;
use App\Http\Controllers\AdminControllers\AdminLoginController;
use App\Http\Controllers\UserControllers\ShowCompanyController;
use App\Http\Controllers\AdminControllers\RegisterAdminController;
use App\Http\Controllers\AdminControllers\CompanyManagement\AddCompanyController;
use App\Http\Controllers\AdminControllers\CompanyManagement\ViewCompanyController;
use App\Http\Controllers\AdminControllers\CompanyManagement\DeleteCompanyController;
use App\Http\Controllers\AdminControllers\CompanyManagement\UpdateCompanyController;
use App\Http\Controllers\AdminControllers\PullmanTypeManagement\AddPullmanTypeController;

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


Route::post('login', function( LoginByEmailRequest $request){

    $result = (new AdminLoginController)->__invoke( $request);
    return $result  ;

});


 Route::post('signup',RegisterAdminController::class);


 //-------
 Route::prefix('company')->group(function () {
    Route::post('add',AddCompanyController::class);
    Route::post('delete',DeleteCompanyController::class);
    Route::post('update',UpdateCompanyController::class);
});

 Route::get("view/companies",ViewCompanyController::class);


 Route::prefix('pullmanType')->group(function () {
    Route::post('add',AddPullmanTypeController::class);
    // Route::post('delete',::class);
    // Route::post('update',::class);
});

Route::get('sent_notification',function(){

    broadcast(new SeatAvailable('hi'))->toOthers();
});

