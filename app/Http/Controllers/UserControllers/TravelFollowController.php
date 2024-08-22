<?php
namespace App\Http\Controllers\UserControllers;


use Illuminate\Http\Request;
use App\Repository\BaseRepository;
use App\Http\Controllers\Controller;
use App\Adapters\presenters\JsonResponsePresenter;
use App\BusinessLogic\UseCases\UserActor\TravelFollowUseCase\TravelFollowInput;
use App\BusinessLogic\UseCases\UserActor\TravelFollowUseCase\TravelFollowLogic;


class TravelFollowController extends Controller
{
    public function __invoke(Request $request){
        $data = ["userId" => auth()->user()->userId , "travelId" => $request->travelId];
        return $this->applyAspect(

            //--------------------Functional Service ------------------------------------

            new TravelFollowLogic(
                 new TravelFollowInput($data) ,
                 new BaseRepository ,
                 new JsonResponsePresenter,
            ),

            //------------------Non Functional Registered--------------------------------
                        [
                            /*array of non fanctional services*/
                        ]


            )->sendResult();


    }
}
