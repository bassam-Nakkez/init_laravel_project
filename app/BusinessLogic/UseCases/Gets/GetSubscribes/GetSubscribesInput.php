<?php
namespace App\BusinessLogic\UseCases\Gets\GetSubscribes;

use App\BusinessLogic\Core\InternalInterface\RequestModel;

class GetSubscribesInput implements RequestModel{


    public function __construct( $data )
    {
        // $this->countryId = $data['countryId'];
    }


    public function toArray() :array {
        return [
          //  "countryId" => $this->countryId,
        ];
  }


}