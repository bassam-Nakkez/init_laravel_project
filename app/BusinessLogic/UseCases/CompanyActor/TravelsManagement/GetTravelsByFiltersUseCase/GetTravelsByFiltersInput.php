<?php
namespace App\BusinessLogic\UseCases\CompanyActor\TravelsManagement\GetTravelsByFiltersUseCase;

use DateTime;
use App\BusinessLogic\Core\InternalInterface\RequestModel;

class GetTravelsByFiltersInput implements RequestModel{

    private  $companyId ;
    private  string $from;
    private  string $to ;
    private  ?int $stationId ;
    private  bool $isVIP = false  ;
    private  $date;
    private  $expired;

    public function __construct(array $data){
        
        $this->companyId = $data['companyId'];
        $this->from = $data ['from'];
        $this->to = $data['to'];
        $this->stationId = $data['stationId'];
        $this->isVIP = ($data['isVIP'] != null )? $data['isVIP'] : false;
        $this->setDate($data['date']);
        $this->expired = ($data['expired'] != null )? $data['expired'] : false;
        
}

public function setDate($date){
   if($date != null){

    $dateformat = new DateTime("@$date");
    $this->date = $dateformat->format('Y-m-d');
   }
   else {  
             if($this->expired){   $this->date = date('Y-m-d', strtotime('-1 day'));    } 
             else {  $this->date= date('Y-m-d'); }
        }

}

public function isExpired(){
    return $this->expired;   
}

public function companyId() {
    return $this->companyId;
}

public function getStationId() {
    return $this->stationId;
}

public function getDate() {
     return $this->date;
}

public function getIsVIP(){
    return $this->isVIP;
}

public function getFrom(){
    return $this->from;
}

public function getTo(){
    return $this->to;
}


public function toArray() :array {
    return [

        "companyId" => $this->companyId,
        "from" => $this->from,
        "to" => $this->to,
        "stationId" => $this->stationId,
        "isVIP" => $this->isVIP,
        "date" => $this->date,

    ];
}

}
