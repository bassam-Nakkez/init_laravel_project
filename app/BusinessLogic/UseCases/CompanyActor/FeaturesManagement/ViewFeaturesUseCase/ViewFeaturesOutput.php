<?php
namespace App\BusinessLogic\UseCases\CompanyActor\FeaturesManagement\ViewFeaturesUseCase;

use App\BusinessLogic\Core\InternalInterface\ResponseModel;

class ViewFeaturesOutput implements ResponseModel {


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