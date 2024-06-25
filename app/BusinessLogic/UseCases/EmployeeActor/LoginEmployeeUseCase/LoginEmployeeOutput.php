<?php
namespace App\BusinessLogic\UseCases\EmployeeActor\LoginEmployeeUseCase;

use App\BusinessLogic\Core\InternalInterface\ResponseModel;

class LoginEmployeeOutput implements ResponseModel{



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