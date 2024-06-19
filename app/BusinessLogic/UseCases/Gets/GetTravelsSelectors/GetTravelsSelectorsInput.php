<?php
namespace App\BusinessLogic\UseCases\Gets\GetTravelsSelectors;

use App\BusinessLogic\Core\InternalInterface\RequestModel;

class GetTravelsSelectorsInput implements RequestModel{

    private string $companyId;
    private int $countryId = 1 ;

    public function __construct( $input )
    {

         $this->companyId   = $input['companyId'] ;

    }


    public function getCompanyId(){ return $this->companyId ;}

    public function getCountry(){ return $this->countryId ;}

    public function toArray() :array {
        return [
            "companyId" => $this->companyId??null ,
        ];
  }


}