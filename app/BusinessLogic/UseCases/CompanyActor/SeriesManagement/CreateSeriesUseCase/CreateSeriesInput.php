<?php
namespace App\BusinessLogic\UseCases\CompanyActor\SeriesManagement\CreateSeriesUseCase;


use App\BusinessLogic\Core\InternalInterface\RequestModel;

class CreateSeriesInput implements RequestModel{

    private   $seriesName;
    private   $companyId ;
    private   $stations;
    private   $city;

    public function __construct(array $data){
        $this->companyId = $data['companyId'];
        $this->seriesName = $data['seriesName'];
        $this->city = $data['city'];
        $this->stations = $data['stations'];
}

    public function getStations(){
        return $this->stations;
    }

    public function getCompanyId() {
        return $this->companyId;
    }

    public function getCity() {
    return $this->city;
    }

public function getSeriesName() {
     return $this->seriesName;
}



public function toArray() :array {
    return [
        "companyId" => $this->companyId,
        "name" => $this->seriesName,
        "city" => $this->city,
    ];
}

}