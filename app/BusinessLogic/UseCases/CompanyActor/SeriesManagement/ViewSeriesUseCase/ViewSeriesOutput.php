<?php
namespace App\BusinessLogic\UseCases\CompanyActor\SeriesManagement\ViewSeriesUseCase;

use App\BusinessLogic\Core\InternalInterface\ResponseModel;

class ViewSeriesOutput implements ResponseModel {


    public function __construct( private $data)
    {}

    public function getDataAsObject()  { 
        return $this->data;
   }



   public function getOutputAsArray() : array{

       $result = array();

       foreach($this->data as $data ){ 

       array_push( $result ,[
            'stationId' => $this->data['stationId'],
            'name'   => $this->data['name'] ,
        ]);
        }
            return $result;
    }

}