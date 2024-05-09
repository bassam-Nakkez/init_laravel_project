<?php
namespace App\BusinessLogic\UseCases\UserActor\ShowCompanyPostsUseCase;


use App\BusinessLogic\Core\InternalInterface\ResponseModel;

class ShowCompanyPostsOutput implements ResponseModel {


    public function __construct(private $dta)
    {}


    public function getOutputAsArray() : array{
        return [
            "success" => true
        ];
    }

}