<?php

namespace App\Http\Controllers\UserControllers;

use App\Services\Services;
use App\Http\Models\Travel;
use Illuminate\Http\Request;
use App\Http\Models\SeriesStation;
use App\Repository\BaseRepository;
use App\Http\Controllers\Controller;
use App\Adapters\presenters\JsonResponsePresenter;
use App\BusinessLogic\UseCases\UserActor\SearchAndFilterTravelUseCase\SearchAndFilterTravelInput;
use App\BusinessLogic\UseCases\UserActor\SearchAndFilterTravelUseCase\SearchAndFilterTravelLogic;

class SearchAndFilterTravelController extends Controller
{



        public function __invoke( Request  $request )
        {

            return $this->applyAspect(

            //--------------------Functional Service ------------------------------------

            new SearchAndFilterTravelLogic(new SearchAndFilterTravelInput($request->all()) ,
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
