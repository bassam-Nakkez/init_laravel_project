<?php
namespace App\BusinessLogic\UseCases\UserActor\CompanyFollowUseCase;


use App\BusinessLogic\Core\InternalInterface\ResponseModel;

class CompanyFollowOutput implements ResponseModel {


    public function __construct()
    {}


    public function getOutputAsArray() : array{
        return [
            "success" => true
        ];
    }

}
