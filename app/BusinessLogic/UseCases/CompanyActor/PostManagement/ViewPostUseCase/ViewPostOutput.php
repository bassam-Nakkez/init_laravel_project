<?php
namespace App\BusinessLogic\UseCases\CompanyActor\PostManagement\ViewPostUseCase;


use App\BusinessLogic\Core\InternalInterface\ResponseModel;

class ViewPostOutput implements ResponseModel {


    public function __construct(private $data)
    {}


    public function getOutputAsArray() : array{
        return $this->data;
    }

}
