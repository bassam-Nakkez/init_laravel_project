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
use App\BusinessLogic\UseCases\UserActor\GetHistoryCurrentTravelUseCase\GetHistoryCurrentTravelInput;
use App\BusinessLogic\UseCases\UserActor\GetHistoryCurrentTravelUseCase\GetHistoryCurrentTravelLogic;
use App\BusinessLogic\UseCases\UserActor\SearchAndFilterTravelUseCase\SearchAndFilterTravelInput;
use App\BusinessLogic\UseCases\UserActor\SearchAndFilterTravelUseCase\SearchAndFilterTravelLogic;
use App\Http\Requests\UserRequests\GetComanyTravelRequest;
use App\Http\Requests\UserRequests\GetHistoryCurrentTravelRequest;

class GetHistoryCurrentTravelController extends Controller
{



        public function __invoke( GetHistoryCurrentTravelRequest  $request )
        {

            // $stationId = 21;
            // $subQuery = SeriesStation::select('seriesId')->where('stationId',$stationId)->get();
            // $data = Travel::whereIn('seriesId',$subQuery)->get();


            // $subQuery = SeriesStation::select('seriesId')->where('stationId',4)->get();
            // return response()->json($subQuery);


            return $this->applyAspect(

            //--------------------Functional Service ------------------------------------

            new GetHistoryCurrentTravelLogic(new GetHistoryCurrentTravelInput($request->all()) ,
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
