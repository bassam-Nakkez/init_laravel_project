<?php
namespace App\BusinessLogic\UseCases\EmployeeActor\LoginEmployeeUseCase;

use App\BusinessLogic\Core\InternalInterface\RequestModel;

class LoginEmployeeInput implements RequestModel{

    private String $email;
    private String $password;

  public function __construct(array $data)
  {

    $this->setEmail($data['email']);

    $this->setPassword($data['password']);

  }


  public function setEmail($email){
    $this->email = $email;
  }

  public function setPassword($password) {
        $this->password = $password;
  }

  public function getPassword() {
        return $this->password;
    }


  public function getEmail() {
    return $this->email;
  }


  public function toArray() :array {
        return [
            "email" => $this->email,
            "password" => $this->password
        ];
  }


}