<?php
namespace App\BusinessLogic\UseCases\AdminActor\CompanyManagement\DeleteCompanyUseCase;

use App\BusinessLogic\Core\InternalInterface\RequestModel;

class DeleteCompanyInput implements RequestModel{

   // private   $stationId;
    private   $companyId ;
  

    public function __construct(array $data){
        $this->companyId = $data['companyId'];
      //  $this->stationId = $data['stationId'] ;

}


public function getCompanyId() {
    return $this->companyId;
}

// public function getStationId() {
//     return $this->stationId;
//     } 


public function toArray() :array {
    return [
        "companyId" => $this->companyId,
        //"stationId" => $this->stationId,
    ];
}

}
