<?php

namespace App\Http\Controllers\UserControllers;

use App\Services\Services;
use App\Http\Models\Travel;
use Illuminate\Http\Request;
use App\Http\Models\SeriesStation;
use App\Repository\BaseRepository;
use App\Http\Controllers\Controller;
use App\Adapters\presenters\JsonResponsePresenter;
use App\BusinessLogic\UseCases\UserActor\GetComanyTravelUseCase\GetComanyTravelInput;
use App\BusinessLogic\UseCases\UserActor\GetComanyTravelUseCase\GetComanyTravelLogic;
use App\BusinessLogic\UseCases\UserActor\GetDriverTravelUseCase\GetDriverTravelInput;
use App\BusinessLogic\UseCases\UserActor\GetDriverTravelUseCase\GetDriverTravelLogic;
use App\BusinessLogic\UseCases\UserActor\SearchAndFilterTravelUseCase\SearchAndFilterTravelInput;
use App\BusinessLogic\UseCases\UserActor\SearchAndFilterTravelUseCase\SearchAndFilterTravelLogic;
use App\Http\Requests\UserRequests\GetComanyTravelRequest;

class GetDriverTravelController extends Controller
{



        public function __invoke( GetComanyTravelRequest  $request )
        {

            $data =$request->all();
            $data['employeeId'] = auth("other")->user()->employee->employeeId;


            return $this->applyAspect(

            //--------------------Functional Service ------------------------------------

            new GetDriverTravelLogic(new GetDriverTravelInput($data) ,
            new BaseRepository ,
            new JsonResponsePresenter,
           ),

        //------------------Non Functional Registered--------------------------------
            [
                /*array of non functional services*/
            ]


    )->sendResult();

    }

}
