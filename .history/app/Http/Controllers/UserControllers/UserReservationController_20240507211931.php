<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequests\UserReservationRequest;
use Illuminate\Http\Request;

class UserReservationController extends Controller
{
    public function __invoke(UserReservationRequest $userReservationRequest)
    {

        $data = ["userId" => auth()->user()->userId
                , "travelId" => $userReservationRequest->travelId];
        return $this->applyAspect(

            //--------------------Functional Service ------------------------------------

            new GetTravelMatrixLogic(
            new GetTravelMatrixInput($data),
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