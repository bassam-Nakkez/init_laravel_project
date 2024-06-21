<?php

namespace App\Http\Controllers\CompanyControllers\FeaturesManagementControllers;

use App\Services\Services;
use Illuminate\Http\Request;
use App\Repository\BaseRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Adapters\presenters\JsonResponsePresenter;
use App\BusinessLogic\UseCases\CompanyActor\FeaturesManagement\ViewFeaturesUseCase\ViewFeatureInput;
use App\BusinessLogic\UseCases\CompanyActor\FeaturesManagement\ViewFeaturesUseCase\ViewFeaturesLogic;

class ViewFeaturesController extends Controller
{
    public function __invoke( Request  $request )
    {

        $company = Auth::guard('other')->user()->company;
        $input = $request->all();
        $input['companyId'] = $company->companyId;
        
        return $this->applyAspect(

        //--------------------Functional Service ------------------------------------

        new ViewFeaturesLogic(new ViewFeatureInput($input) ,
        new BaseRepository,
        new JsonResponsePresenter,
        new Services),

    //------------------Non Functional Registered--------------------------------
        [
            /*array of non functional services*/
        ]
    )->sendResult();
  }
}
