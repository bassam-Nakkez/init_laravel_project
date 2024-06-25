<?php
namespace App\BusinessLogic\UseCases\CompanyActor\ReservationManagement\CompanyReservationUseCase;


use App\BusinessLogic\Core\InternalInterface\ResponseModel;

class CompanyReservationOutput implements ResponseModel {


    public function __construct( private $data)
    {}


    public function getDataAsObject()  {
         return $this->data;
    }
    public function getOutputAsArray() : array{
        return [
             "success" => $this->data
        ];
    }

}
