<?php
namespace App\BusinessLogic\UseCases\AdminActor\CompanyManagement\UpdateCompanyUseCase;

use App\BusinessLogic\Core\InternalInterface\RequestModel;

class UpdateCompanyInput implements RequestModel {
    // public String $name;
    // public String $password;
    // public String $subscribeId;
    // public String $aboutAs;
    // public String $logo;
     public String $companyId;
    public $authInfo =[];
    public $newData = [];


    function __construct(array $data)
    {
        if( isset($data['name']) ) $this->newData [ 'name'] = $data['name'];
        if( isset($data['email']) ) $this->authInfo [ 'email'] = $data['email'] ;
        if( isset($data['password']) ) $this->authInfo [ 'password'] = $data['password'];
        if( isset($data['subscribeId']) ) $this->newData [ 'subscribeId'] = $data['subscribeId'];
        if( isset($data['aboutAs']) ) $this->newData [ 'aboutAs'] = $data['aboutAs'];
        if( isset($data['logo']) ) $this->newData [ 'logo'] = $data['logo'];
        if( isset($data['isActive']) ) $this->newData [ 'isActive'] = $data['isActive'];
        $this->companyId        = $data['companyId'];


    }

    public function getCompanyId(){
        return $this->companyId;
    }

    public function getAuthInfo():array{
        return $this->authInfo;
    }

    public function getNewData():array{
        return $this->newData;
    }

    public function toArray() : array
    {
        return [

        ];
    }

}