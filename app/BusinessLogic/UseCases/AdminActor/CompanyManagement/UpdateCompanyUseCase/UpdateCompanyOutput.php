<?php
namespace App\BusinessLogic\UseCases\AdminActor\CompanyManagement\UpdateCompanyUseCase;


use App\BusinessLogic\Core\InternalInterface\ResponseModel;

class UpdateCompanyOutput  implements ResponseModel
{
    private String $companyId;
    private String $name;
    private String $phoneNumber;

    public function __construct($data)
    {
        $this->companyId = $data['companyId'];
        $this->name = $data['name'];
        $this->phoneNumber = $data['phoneNumber'];
    }

    public function getOutputAsArray() : array
    {
        return [
            "companyId" => $this->companyId,
            "name" => $this->name,
            "phoneNumber" => $this->phoneNumber,
        ];
    }

}
