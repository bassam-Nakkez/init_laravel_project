<?php

namespace App\Http\Controllers;

use App\Services\Services;
use Illuminate\Http\Request;
use App\Repository\BaseRepository;
use App\Adapters\presenters\JsonResponsePresenter;
use App\BusinessLogic\UseCases\LoginUseCase\LoginInput;
use App\BusinessLogic\UseCases\LoginUseCase\LoginLogic;
use App\Http\Requests\publicRequests\LoginByEmailRequest;

class WebLoginController extends Controller
{
    public function __invoke( LoginByEmailRequest $request )
    {


        return $this->applyAspect(

        //--------------------Functional Service ------------------------------------

        new LoginLogic(new LoginInput($request->validated()),
        new BaseRepository ,
        new JsonResponsePresenter,
        new Services),

    //------------------Non Functional Registered--------------------------------
        [
            /*array of non functional services*/
        ]


)->sendResult();
        
    }

}
