<?php
namespace App\BusinessLogic\UseCases\UserActor\ViewUserNotificationUseCase;

use App\BusinessLogic\Core\InternalInterface\ResponseModel;

class ViewUserNotificationOutput implements ResponseModel {


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