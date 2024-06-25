<?php
namespace App\BusinessLogic\UseCases\CompanyActor\ReservationManagement\CompanyReservationUseCase;


use App\BusinessLogic\Core\InternalInterface\RequestModel;

class CompanyReservationInput implements RequestModel
{
    private  $fromApp;
    private  $personalId;
  

    public function __construct(array $data)
    {
        $this->fromApp = $data['fromApp'] ?? False;
        $this->personalId = $data['personalId'];
    }


    public function isFromApp(){
        return $this->fromApp;
    }


    public function getBirthDay(){
        return  $this->birthDay;
    }


    public function getTravelId()
    {
        return $this->travelId;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getStation(){
        return $this->station;
    }

    public function getMatrix(){
        return $this->matrix;
    }

    public function toArray(): array
    {
        return [
            "travelId" => $this->travelId,
            "station" => $this->station,
            "firstName" => $this->firstName,
            "lastName" => $this->lastName,
            "phoneNumber" => $this->phoneNumber,
            "gender" => $this->gender,
            "birthDay" => $this->birthDay,
            "personalId" => $this->personalId,
        ];
    }
}
