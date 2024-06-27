<?php
namespace App\BusinessLogic\UseCases\UserActor\ViewUserNotificationUseCase;

use App\BusinessLogic\Core\InternalInterface\RequestModel;

class ViewUserNotificationInput implements RequestModel{

    private string $userId;

    public function __construct( $input )
    {

         $this->userId   = $input['userId'] ;

    }


    public function getUserId(){ return $this->userId ;}



    public function toArray() :array {
        return [
            "userId" => $this->userId ,
        ];
  }


}