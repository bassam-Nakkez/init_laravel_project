<?php
namespace App\BusinessLogic\UseCases\UserActor\GetHistoryCurrentTravelUseCase;

use DateTime;
use App\BusinessLogic\Core\InternalInterface\RequestModel;

class GetHistoryCurrentTravelInput implements RequestModel{

    private  $userId ;
    private  $date ;

    public function __construct(array $data){
        $this->userId = $data['userId'];
}

public function getUserId()  {
    return $this->userId;
}

public function getDate()  {
    $this->date = now();
    $date = date_format($this->date,"Y-m-d");
    return $date;
}
public function toArray() :array {
    return [

        "userId" => $this->userId,

    ];
}

}
