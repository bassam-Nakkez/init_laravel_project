<?php
namespace App\BusinessLogic\UseCases\CompanyActor\PostManagement\DeletePostUseCase;

use App\BusinessLogic\Core\InternalInterface\RequestModel;

class DeletePostInput implements RequestModel{

    private   $postId;
    private   $companyId ;
  

    public function __construct(array $data){
        $this->postId = $data['postId'];
        $this->companyId = $data['companyId'] ;

}


public function getCompanyId() {
    return $this->companyId;
}

public function getPostId() {
    return $this->postId;
    } 


public function toArray() :array {
    return [
        "companyId" => $this->companyId,
        "postId" => $this->postId,
    ];
}

}
