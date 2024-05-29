<?php
namespace App\BusinessLogic\UseCases\AdminActor\CompanyManagement\UpdateCompanyUseCase;


use App\BusinessLogic\Core\InternalInterface\ResponseModel;

class UpdateCompanyOutput  implements ResponseModel
{

    public function __construct(private $data)
    {
        // $this->companyId = $data['companyId'];
        // $this->name = $data['name'];
        // $this->email = $data['email'];
    }

    public function getDataAsObject()  { 
        return $this->data;
   }

    public function getOutputAsArray() : array
    {
        return [
            // "companyId" => $this->companyId,
            // "name" => $this->name,
            // "email" => $this->email,
        ];
    }

}
