<?php
namespace App\Http\Controllers\EmployeeControllers;

use App\Services\Services;
use App\Repository\BaseRepository;
use App\Http\Controllers\Controller;
use App\Adapters\presenters\JsonResponsePresenter;
use App\Http\Requests\publicRequests\LoginByEmailRequest;
use App\Http\Requests\publicRequests\LoginByPhoneNumberRequest;
use App\BusinessLogic\UseCases\EmployeeActor\LoginEmployeeUseCase\LoginEmployeeInput;
use App\BusinessLogic\UseCases\EmployeeActor\LoginEmployeeUseCase\LoginEmployeeLogic;

class EmployeeLoginController extends Controller
{


    public function __invoke( LoginByEmailRequest $request )
    {

       return $this->applyAspect(

        //--------------------Functional Service ------------------------------------

        new LoginEmployeeLogic( new LoginEmployeeInput($request->validated()),
        new BaseRepository ,
        new JsonResponsePresenter,
        new Services),

    //------------------Non Functional Registered--------------------------------
        [
            /*array of non fanctional services*/
        ]


)->sendResult();

        
    }

}