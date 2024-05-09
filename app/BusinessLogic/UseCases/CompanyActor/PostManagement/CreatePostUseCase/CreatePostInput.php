<?php
namespace App\BusinessLogic\UseCases\CompanyActor\PostManagement\CreatePostUseCase;

use App\BusinessLogic\Core\InternalInterface\RequestModel;

class CreatePostInput implements RequestModel{

    private   $companyId;
    private   $content ;
    private   $image;
    

    public function __construct(array $data){
        $this->companyId  = $data['companyId'];
        $this->content    = $data['content'];
        $this->image      = $data['image'];
}

public function getCompanyId() {
    return $this->companyId;
}

public function getcontent() {
    return $this->content;
}

public function getImage () {
    return $this->image;
}


public function toArray() :array {
    return [
        "companyId" => $this->companyId,
        "content"   => $this->content,
        "image"     => $this->image,
    ];
}

}