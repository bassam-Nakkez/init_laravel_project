<?php
namespace App\BusinessLogic\UseCases\CompanyActor\PostManagement\ViewPostUseCase;


use App\BusinessLogic\Core\InternalInterface\RequestModel;

class ViewPostInput implements RequestModel
{

    private  $companyId;

    public function __construct(array $data)
    {
        $this->companyId = $data['companyId'];
    }

    public function getCompanyId()
    {
        return $this->companyId;
    }



    public function toArray(): array
    {
        return [
            "companyId" => $this->companyId,
        ];
    }
}
