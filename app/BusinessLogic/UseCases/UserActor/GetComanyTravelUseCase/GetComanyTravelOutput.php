<?php
namespace App\BusinessLogic\UseCases\UserActor\GetComanyTravelUseCase;

use App\BusinessLogic\Core\InternalInterface\ResponseModel;

class GetComanyTravelOutput implements ResponseModel {


    public function __construct( private $data)
    {}


    public function getDataAsObject()  {
         return $this->data;
    }
    public function getOutputAsArray() : array{
        return [

        ];
    }

}
