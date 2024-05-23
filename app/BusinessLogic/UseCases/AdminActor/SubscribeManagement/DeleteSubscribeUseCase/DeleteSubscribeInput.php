<?php
namespace App\BusinessLogic\UseCases\AdminActor\SubscribeManagement\DeleteSubscribeUseCase;

use App\BusinessLogic\Core\InternalInterface\RequestModel;

class DeleteSubscribeInput implements RequestModel{

    private   $subscribeId;
  

    public function __construct(array $data){
        $this->subscribeId = $data['subscribeId'] ;

}



public function getSubscribeId() {
    return $this->subscribeId;
    } 


public function toArray() :array {
    return [
        "subscribeId" => $this->subscribeId,
    ];
}

}
