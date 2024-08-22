<?php
namespace App\BusinessLogic\UseCases\UserActor\UserReservationUseCase;


use App\BusinessLogic\Core\InternalInterface\RequestModel;

class UserReservationInput implements RequestModel
{

    private  $travelId;
    private  $userId;
    private  $userGender;
    private  $station;
    private  $matrix ;

    public function __construct(array $data)
    {
        $this->travelId = $data['travelId'];
        $this->userId = $data['userId'];
        $this->userGender = $data['gender'];
        $this->station = $data['station'];
        $this->matrix = $data['matrix'];
    }

    public function getTravelId()
    {
        return $this->travelId;
    }

    public function getUserGender()
    {
        return  $this->userGender ;
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
            "userId" => $this->userId,
            "station" => $this->station,
            "matrix" => $this->matrix,
        ];
    }
}
