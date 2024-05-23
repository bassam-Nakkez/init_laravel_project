<?php
namespace App\BusinessLogic\UseCases\AdminActor\RegisterAdminUseCase;

use App\BusinessLogic\Core\InternalInterface\ResponseModel;

class RegisterAdminOutput  implements ResponseModel
{

    private String $adminId;
    private String $name;
    private String $email;

    public function __construct($data)
    {
        $this->adminId = $data['adminId'];
        $this->name = $data['name'];
        $this->email = $data['email'];
    }

    public function getOutputAsArray() : array
    {
        return [
            "adminId" => $this->adminId,
            "name" => $this->name,
            "email" => $this->email,
        ];
    }
}
