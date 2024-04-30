<?php
namespace App\BusinessLogic\UseCases\UserActor\SearchAndFilterTravelUseCase;

use DateTime;
use DateTimeZone;
use App\BusinessLogic\Core\Options\Settings;
use App\BusinessLogic\Core\InternalInterface\RequestModel;

class SearchAndFilterTravelInput implements RequestModel{

    private  $companies ;
    private  string $from;
    private  string $to ;
    private  ?int $stationId ;
    private  $isVIP  ;
    private  $date;

    public function __construct(array $data){
        $this->companies = $data['companies'];
        $this->from = $data ['from'];
        $this->to = $data['to'];
        $this->stationId = $data['stationId'];
        $this->isVIP = $data['isVIP'];
        $this->setDate($data['date']);
}

public function setDate($date){

    $dateformat = new DateTime();
    $dateformat->setTimezone(new DateTimeZone(Settings::$timeZone));
    
   if($date != null){
    $dateformat->setTimestamp($date);
    $this->date = $dateformat->format('Y-m-d');
    // $this->date =  date('Y-m-d ', $date);;
   }
   else {  $this->date = $dateformat->format('Y-m-d');}

}

public function getCompanies() {
    return $this->companies;
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

        "companies" => $this->companies,
        "from" => $this->from,
        "to" => $this->to,
        "stationId" => $this->stationId,
        "isVIP" => $this->isVIP,
        "date" => $this->date,

    ];
}

}
