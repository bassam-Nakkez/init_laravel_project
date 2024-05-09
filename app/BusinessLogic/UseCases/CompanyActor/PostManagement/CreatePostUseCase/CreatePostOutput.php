<?php
namespace App\BusinessLogic\UseCases\CompanyActor\PostManagement\CreatePostUseCase;

use App\BusinessLogic\Core\InternalInterface\ResponseModel;

class CreatePostOutput implements ResponseModel {

    public function __construct( private $data)
    {}

    public function getDataAsObject()  { 
         return $this->data;
    }

    public function getOutputAsObject() {return $this->data;}

    public function getOutputAsArray() : array{
        return [
            'content'=>$this->data->content,
            'image'=>$this->data->image,
        ];
    }

}