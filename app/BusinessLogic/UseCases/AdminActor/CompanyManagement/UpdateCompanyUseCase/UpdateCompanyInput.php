<?php
namespace App\BusinessLogic\UseCases\AdminActor\CompanyManagement\UpdateCompanyUseCase;

use App\BusinessLogic\Core\InternalInterface\RequestModel;

class UpdateCompanyInput implements RequestModel {
    public String $name;
    public String $phoneNumber;
    public String $password;
    public String $subscribeId;
    public String $aboutAs;
    public String $logo;
    public String $companyId;


    function __construct(array $data)
    {
        $this->name = $data['name'];
        $this->phoneNumber = $data['phoneNumber'];
        $this->subscribeId = $data['subscribeId'];
        $this->setPassword($data['password']);
        $this->aboutAs     = $data['aboutAs'];
        $this->logo        = $data['logo'];
        $this->companyId        = $data['companyId'];


    }

    public function getCompanyId(){
        return $this->companyId;
    }


    public function setPassword($password){
        // $this->password = Hash::make($password);
        $this->password =$password;
    }

    public function getPhoneNumber(){
        return $this->phoneNumber;
    }

    public function getPassword(){
        return $this->password;
    }


    public function toArray() : array
    {
        return [
            "name" => $this->name,
            "phoneNumber" => $this->phoneNumber,
            "password" => $this->password,
            "subscribeId" => $this->subscribeId,
            "logo"=> $this->logo,
            "aboutAs"=> $this->aboutAs
        ];
    }

}