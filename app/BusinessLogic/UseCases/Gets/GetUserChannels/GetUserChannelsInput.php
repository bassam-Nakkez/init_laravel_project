<?php
namespace App\BusinessLogic\UseCases\Gets\GetUserChannels;

use App\BusinessLogic\Core\InternalInterface\RequestModel;

class GetUserChannelsInput implements RequestModel{

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
