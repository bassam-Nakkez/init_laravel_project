<?php
namespace App\BusinessLogic\UseCases\CompanyActor\TravelsManagement\ViewTravelsUseCase;

use App\BusinessLogic\Core\InternalInterface\RequestModel;

class ViewTravelsInput implements RequestModel{

    private string $companyId;

    public function __construct( $input )
    {

         $this->companyId   = $input['companyId'] ;

    }


    public function getCompanyId(){ return $this->companyId ;}



    public function toArray() :array {
        return [
            "companyId" => $this->companyId??null ,
        ];
  }


}