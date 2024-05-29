<?php

namespace App\Http\Controllers\AdminControllers\CompanyManagement;

use App\Services\Services;
use Illuminate\Http\Request;
use App\Repository\BaseRepository;
use App\Http\Controllers\Controller;
use App\Adapters\presenters\JsonResponsePresenter;
use App\BusinessLogic\UseCases\AdminActor\CompanyManagement\DeleteCompanyUseCase\DeleteCompanyInput;
use App\BusinessLogic\UseCases\AdminActor\CompanyManagement\DeleteCompanyUseCase\DeleteCompanyLogic;

class DeleteCompanyController extends Controller
{
    
    public function __invoke( Request $request )
    {

    return $this->applyAspect(

        //--------------------Functional Service ------------------------------------

        new DeleteCompanyLogic(new DeleteCompanyInput($request->all()) ,
        new BaseRepository ,
        new JsonResponsePresenter,
        new Services
    ),

    //------------------Non Functional Registered--------------------------------
        [
            /*array of non functional services*/
        ]

)->sendResult();
        

    }
}
