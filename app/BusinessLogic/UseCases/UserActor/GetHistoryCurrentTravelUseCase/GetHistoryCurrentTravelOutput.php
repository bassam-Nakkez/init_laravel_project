<?php
namespace App\BusinessLogic\UseCases\UserActor\GetHistoryCurrentTravelUseCase;

use App\BusinessLogic\Core\InternalInterface\ResponseModel;

class GetHistoryCurrentTravelOutput implements ResponseModel {


    public function __construct( private $myCurrentTrips , private $myPerviousTrips)
    {}


    public function getOutputAsArray() : array{
        return [
            "myCurrentTrips"=>$this->myCurrentTrips,
            "myPreviousTrips" =>$this->myPerviousTrips
        ];
    }

}
