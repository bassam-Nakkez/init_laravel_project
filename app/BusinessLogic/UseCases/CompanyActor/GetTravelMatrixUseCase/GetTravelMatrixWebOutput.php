<?php
namespace App\BusinessLogic\UseCases\CompanyActor\GetTravelMatrixUseCase;


use App\BusinessLogic\Core\InternalInterface\ResponseModel;

class GetTravelMatrixWebOutput implements ResponseModel {


    public function __construct( private $data)
    {}


    public function getDataAsObject()  {
         return $this->data;
    }
    public function getOutputAsArray() : array{
        return [
             $this->data
        ];
    }

}
