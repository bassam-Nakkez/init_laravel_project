<?php
namespace App\BusinessLogic\UseCases\UserActor\GetComanyTravelUseCase;

use DateTime;
use App\BusinessLogic\Core\InternalInterface\RequestModel;

class GetComanyTravelInput implements RequestModel{

    private  $companyId ;

    public function __construct(array $data){
        $this->companyId = $data['companyId'];
}

public function getCompanyId()  {   
    return $this->companyId;
}
public function toArray() :array {
    return [

        "companyId" => $this->companyId,

    ];
}

}
