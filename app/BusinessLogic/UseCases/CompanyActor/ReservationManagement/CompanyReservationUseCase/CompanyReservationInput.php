<?php
namespace App\BusinessLogic\UseCases\CompanyActor\ReservationManagement\CompanyReservationUseCase;


use App\BusinessLogic\Core\InternalInterface\RequestModel;

class CompanyReservationInput implements RequestModel
{

    private  $travelId;
    private  $userId;
    private  $station;
    private  $matrix ;
    public String $firstName;
    public String $lastName;
    public String $phoneNumber;
    public String $gender;
    public String $personalId;
    public String $birthDay;
    private  $selectedMaleSeats = [] ;
    private  $selectedFemaleSeats = [] ;

    public function __construct(array $data)
    {
        $this->travelId = $data['travelId'];
        $this->station = $data['station'];
        $this->selectedMaleSeats = $data['selectedMaleSeats'];
        $this->selectedFemaleSeats = $data['selectedFemaleSeats'];
        $this->firstName = $data['firstName'];
        $this->lastName = $data['lastName'];
        $this->phoneNumber = $data['phoneNumber'];
        $this->gender = $data['gender'];
        $this->personalId = $data['personalId'];
        $this->birthDay = $data['birthDay'];

    }


    public function getMaleSeats() : Array {
        return $this->selectedMaleSeats;
    }

    public function getFemaleSeats() : Array {
        return $this->selectedFemaleSeats;
    }

    public function getPhoneNumber(){
        return $this->phoneNumber;
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
