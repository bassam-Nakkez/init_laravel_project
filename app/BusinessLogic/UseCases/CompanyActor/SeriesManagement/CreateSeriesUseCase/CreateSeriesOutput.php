<?php
namespace App\BusinessLogic\UseCases\CompanyActor\SeriesManagement\CreateSeriesUseCase;

use App\BusinessLogic\Core\InternalInterface\ResponseModel;

class CreateSeriesOutput implements ResponseModel {


    public function __construct( private $data)
    {}


    public function getDataAsObject()  { 
         return $this->data;
    }

    public function getOutputAsObject() {return $this->data;}

    public function getOutputAsArray() : array{
        return [
            'stationId'=>$this->data->stationId,
            'stationName'=>$this->data->name,
        ];
    }

}