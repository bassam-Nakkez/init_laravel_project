<?php
namespace App\BusinessLogic\UseCases\Gets\GetSubscribes;

use App\BusinessLogic\Core\InternalInterface\ResponseModel;

class GetSubscribesOutput implements ResponseModel {


    public function __construct( private  $data)
    {}

    public function getDataAsObject()  { 
         return $this->data;
    }



    public function getOutputAsArray() : array{

        $result = array();

        foreach($this->data as $data ){ 

        array_push( $result ,[
            'name'   => $data['name'] ,
        ]);

    }

        return $result;
    }

}