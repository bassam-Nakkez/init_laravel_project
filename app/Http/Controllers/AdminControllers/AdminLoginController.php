<?php
namespace App\Http\Controllers\AdminControllers;

use App\Services\Services;
use App\Repository\BaseRepository;
use App\Http\Controllers\Controller;
use App\Adapters\presenters\JsonResponsePresenter;
use App\Http\Requests\publicRequests\LoginByEmailRequest;
use App\BusinessLogic\UseCases\AdminActor\LoginAdminUseCase\LoginAdminInput;
use App\BusinessLogic\UseCases\AdminActor\LoginAdminUseCase\LoginAdminLogic;

class AdminLoginController extends Controller
{
    public function __invoke( LoginByEmailRequest $request )
    {

   return $this->applyAspect(

    //--------------------Functional Service ------------------------------------

        new LoginAdminLogic(new LoginAdminInput($request->validated()) ,
        new BaseRepository ,
        new JsonResponsePresenter,
        new Services
    ),

    //------------------Non Functional Registered--------------------------------
        [
            /*array of non fanctional services*/
        ]
)->sendResult();
        
    }





}
