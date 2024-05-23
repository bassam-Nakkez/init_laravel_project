<?php
namespace App\BusinessLogic\UseCases\AdminActor\CompanyManagement\AddCompanyUseCase;


use App\BusinessLogic\Core\InternalInterface\ResponseModel;

class AddCompanyOutput  implements ResponseModel
{
    private String $companyId;
    private String $name;
    private String $email;

    public function __construct($data)
    {
        $this->companyId = $data['companyId'];
        $this->name = $data['name'];
        $this->email = $data['email'];
    }

    public function getOutputAsArray() : array
    {
        return [
            "companyId" => $this->companyId,
            "name" => $this->name,
            "email" => $this->email,
        ];
    }

}
