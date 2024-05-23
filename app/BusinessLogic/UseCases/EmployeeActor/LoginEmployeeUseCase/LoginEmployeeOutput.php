<?php
namespace App\BusinessLogic\UseCases\EmployeeActor\LoginEmployeeUseCase;

use App\BusinessLogic\Core\InternalInterface\ResponseModel;

class LoginEmployeeOutput implements ResponseModel{



    private String $employeeId;
    private String $firstName;
    private String $lastName;
    private String $email;
    private String $gendor;
    private ?String $image;
    // private String $companeId;
    private String $token;

    public function __construct($data)
    {
        $this->employeeId = $data['employeeId'];
        $this->firstName = $data['firstName'];
        $this->lastName = $data['lastName'];
        $this->email = $data['email'];
        $this->gendor = $data['gendor'];
        $this->image = $data['image'];
        $this->token = $data['token'];
    }

    public function getOutputAsArray() :array
    {
        return [
            "employeeId" => $this->employeeId,
            "firstName" => $this->firstName,
            "lastName" => $this->lastName,
            "email" => $this->email,
            "gendor" => $this->gendor,
            "image" => $this->image,
            "token" => $this->token,
        ];
    }


}