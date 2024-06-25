<?php
namespace App\BusinessLogic\UseCases\CompanyActor\TravelsManagement\GetTravelsByFiltersUseCase;

use App\BusinessLogic\Core\InternalInterface\ResponseModel;

class GetTravelsByFiltersOutput implements ResponseModel {


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
