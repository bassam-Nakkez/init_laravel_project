<?php
namespace App\BusinessLogic\UseCases\CompanyActor\PostManagement\UpdatePostUseCase;

use App\BusinessLogic\Core\InternalInterface\RequestModel;

class UpdatePostInput implements RequestModel{

    private   $content;
    private   $companyId ;
    private   $image;
    private   $postId ;




    public function __construct(array $data){
        $this->companyId = (isset($data['companyId']))? $data['companyId'] : null;
        $this->image = $data['image'] ?? null;
        $this->content = $data['content'] ?? null;
        $this->postId = $data['postId'] ;
}


public function getCompanyId() {
    return $this->companyId;
}

public function getImage() {
    return $this->image;
}

public function getPostId() {
    return $this->postId;
    } 
    
public function getContent() {
     return $this->content;
}



public function toArray() :array {
    return [
        "companyId" => $this->companyId,
        "image" => $this->image,
        "content" => $this->content,
    ];
}

}