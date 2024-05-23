<?php
namespace App\BusinessLogic\UseCases\AdminActor\SubscribeManagement\AddSubscribeUseCase;

use App\BusinessLogic\Core\InternalInterface\ResponseModel;

class AddSubscribeOutput implements ResponseModel {


    public function __construct( private $data)
    {}


    public function getDataAsObject()  { 
         return $this->data;
    }

    public function getOutputAsObject() {return $this->data;}

    public function getOutputAsArray() : array{
        return [
            'name'=>$this->data->name,
        ];
    }

}