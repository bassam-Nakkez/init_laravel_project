<?php

namespace App\Http\Controllers\CompanyControllers\FeaturesManagementControllers;

use App\Adapters\presenters\JsonResponsePresenter;
use Illuminate\Http\Request;
use App\Repository\BaseRepository;
use App\Http\Controllers\Controller;
use App\BusinessLogic\UseCases\CompanyActor\FeaturesManagement\ViewFeaturesUseCase\ViewFeatureInput;
use App\BusinessLogic\UseCases\CompanyActor\FeaturesManagement\ViewFeaturesUseCase\ViewFeaturesLogic;
use App\Services\Services;

class ViewFeaturesController extends Controller
{
    public function __invoke( Request  $request )
    {
        return $this->applyAspect(

        //--------------------Functional Service ------------------------------------

        new ViewFeaturesLogic(new ViewFeatureInput($request->all()) ,
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
