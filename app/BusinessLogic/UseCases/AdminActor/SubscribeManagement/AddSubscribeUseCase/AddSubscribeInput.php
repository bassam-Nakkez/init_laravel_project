<?php
namespace App\BusinessLogic\UseCases\AdminActor\SubscribeManagement\AddSubscribeUseCase;

use App\BusinessLogic\Core\InternalInterface\RequestModel;

class AddSubscribeInput implements RequestModel{

    private   $name;

    public function __construct(array $data){
        $this->name = $data['name'] ;
}

public function  getName(){
    return $this->name;
}


public function toArray() :array {
    return [
        "name" => $this->name,
    ];
}

}