<?php
namespace App\BusinessLogic\UseCases\CompanyActor\CompanyStatisticsUseCase;


use DateTime;
use App\BusinessLogic\Core\InternalInterface\RequestModel;

class CompanyStatisticsInput implements RequestModel
{

    private  $companyId;
   
    public function __construct(array $data)
    {
        $this->companyId = $data['companyId'];
    }

    public function setDate($date){
       
         $dateformat = new DateTime("@$date");
         $this->birthDay =  $dateformat->format('Y-m-d');
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
