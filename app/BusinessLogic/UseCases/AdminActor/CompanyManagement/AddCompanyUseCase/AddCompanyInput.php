<?php
namespace App\BusinessLogic\UseCases\AdminActor\CompanyManagement\AddCompanyUseCase;

use App\BusinessLogic\Core\InternalInterface\RequestModel;

class AddCompanyInput implements RequestModel {
    public String $name;
    public String $email;
    public String $password;
    public String $subscribeId;
    public String $aboutAs;
    public String $logo;

    function __construct(array $data)
    {
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->subscribeId = $data['subscribeId'];
        $this->setPassword($data['password']);
        $this->aboutAs     = $data['aboutAs'];
        $this->logo        = $data['logo'];

    }

    public function setPassword($password){
        // $this->password = Hash::make($password);
        $this->password =$password;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPassword(){
        return $this->password;
    }


    public function toArray() : array
    {
        return [
            "name" => $this->name,
            "email" => $this->email,
            "password" => $this->password,
            "subscribeId" => $this->subscribeId,
            "logo"=> $this->logo,
            "aboutAs"=> $this->aboutAs
        ];
    }

}