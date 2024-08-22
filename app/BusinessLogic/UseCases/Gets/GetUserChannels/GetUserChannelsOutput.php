<?php
namespace App\BusinessLogic\UseCases\Gets\GetUserChannels;

use App\BusinessLogic\Core\InternalInterface\ResponseModel;

class GetUserChannelsOutput implements ResponseModel {


    public function __construct( private $data)
    {}

    public function getDataAsObject()  { 
        return $this->data;
   }



   public function getOutputAsArray() : array{

       $result = array();

       foreach($this->data as $data ){ 

       
        }
            return $result;
    }

}