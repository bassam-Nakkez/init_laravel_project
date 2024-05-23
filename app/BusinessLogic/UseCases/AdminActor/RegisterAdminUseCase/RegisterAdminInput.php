<?php
namespace App\BusinessLogic\UseCases\AdminActor\RegisterAdminUseCase;

use App\BusinessLogic\Core\InternalInterface\RequestModel;

class RegisterAdminInput implements RequestModel {

 
    public String $name;
    public String $email;
    public String $password;

    function __construct(array $data)
    {
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->password = $data['password'];
    }

    public function getEmail(){
        return $this->email;
    }

    public function setPassword($password){
        // $this->password = Hash::make($password);
        $this->password = $password;

    }

    public function getPassword(){
        return $this->password;
    }

    public function toArray() : array
    {
        return [
            "name" => $this->name,
            "email" => $this->email,
            "password" => $this->password
        ];
    }


}