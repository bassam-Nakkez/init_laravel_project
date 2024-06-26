<?php
namespace App\BusinessLogic\UseCases\UserActor\GetDriverTravelUseCase;

use DateTime;
use App\BusinessLogic\Core\InternalInterface\RequestModel;

class GetDriverTravelInput implements RequestModel{

    private  $companyId ;
    private  $date ;

    public function __construct(array $data){
        $this->companyId = $data['employeeId'];
}

public function getCompanyId()  {
    return $this->companyId;
}

public function getDate()  {
    $this->date = now();
    $date = date_format($this->date,"Y-m-d");
    return $date;
}
public function toArray() :array {
    return [

        "companyId" => $this->companyId,

    ];
}

}
