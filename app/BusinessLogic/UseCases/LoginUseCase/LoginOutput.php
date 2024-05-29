<?php
namespace App\BusinessLogic\UseCases\LoginUseCase;

use App\BusinessLogic\Core\InternalInterface\ResponseModel;

class LoginOutput implements ResponseModel{



    public function __construct(private $data){}


    public function getDataAsObject()  { 
        return $this->data;
   }

    public function getOutputAsArray() : array
    {
        return [

        ];
    }
}