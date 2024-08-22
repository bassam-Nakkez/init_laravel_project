<?php
namespace App\BusinessLogic\UseCases\UserActor\TravelFollowUseCase;


use App\BusinessLogic\Core\InternalInterface\ResponseModel;

class TravelFollowOutput implements ResponseModel {


    public function __construct()
    {}


    public function getOutputAsArray() : array{
        return [
            "success" => true
        ];
    }

}
