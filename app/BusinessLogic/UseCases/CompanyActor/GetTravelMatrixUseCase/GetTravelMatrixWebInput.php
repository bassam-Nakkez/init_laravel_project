<?php
namespace App\BusinessLogic\UseCases\CompanyActor\GetTravelMatrixUseCase;


use App\BusinessLogic\Core\InternalInterface\RequestModel;

class GetTravelMatrixWebInput implements RequestModel
{

    private  $travelId;
    private  $userId;

    public function __construct(array $data)
    {
        $this->travelId = $data['travelId'];

    }

    public function getTravelId()
    {
        return $this->travelId;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function toArray(): array
    {
        return [
            "travelId" => $this->travelId,
            "userId" => $this->userId,
        ];
    }
}
