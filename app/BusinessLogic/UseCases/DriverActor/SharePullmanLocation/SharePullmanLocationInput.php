<?php
namespace App\BusinessLogic\UseCases\DriverActor\SharePullmanLocation;

use App\BusinessLogic\Core\InternalInterface\RequestModel;

class SharePullmanLocationInput implements RequestModel{


    private  $lat;
    private  $log;
    private  $travelId;
    private $driverId;



  public function __construct(array $data)
  {
    
    $this->log = $data['log'];
    $this->travelId = $data['travelId'];
    $this->driverId = $data['driverId'];
    $this->lat = $data['lat'];

  }

  public function getTravelId(){
    return $this->travelId;
  }

  public function getLongitude(){
    return $this->log;
  }

  public function getLatitude(){
    return $this->lat;
  }


  public function getDriverId() {
        return $this->driverId;
  }

  public function toArray(): array
  {
    return [];
  }

}