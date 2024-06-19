<?php
namespace App\BusinessLogic\UseCases\Gets\GetTravelsSelectors;


use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Interfaces\ServicesInterfaces\ServicesInterface;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;

class GetTravelsSelectorsLogic implements UseCase
{

    public function __construct(
        //---------------------------------------------------------------------------------------
        private GetTravelsSelectorsInput $input,  /*| Pass Request To Service*/
        //---------------------------------------------------------------------------------------
        private BaseRepositoryInterface $repository , // for use FrameWork from business logic ---- frameWork 
        private PresenterInterface $output,          // for present output to Views ---- Views
        private ServicesInterface $service           // frameWork services
    ){}
    
     
    public function execute() : Result { 
        
   // ---------------- get series ----------------
        $this->repository->buildRepositoryModel(EntityType::Series , []);

        $columns = ['seriesId',"seriesName"];

          $data['series'] = $this->repository->readRepository()
            ->getRecordsByConditions( $columns , ['companyId'=>$this->input->getCompanyId()]);

    // -------------- get features ------------------
            $this->repository->buildRepositoryModel(EntityType::Feature , []);

            $columns = ['featureId',"feature"];
    
            $data['Features']  = $this->repository->readRepository()
                ->getRecordsByConditions( $columns , ['companyId'=>$this->input->getCompanyId()]);
    
    // -------------- get cities ------------------

    $this->repository->buildRepositoryModel(EntityType::City , []);
        
    $conditions = [
        ['countryId','=', $this->input->getCountry()]
    ];
    
    $data['cities']  = $this->repository->readRepository()->getRecordsByCustomQuery(['cityId',"name"] ,$conditions   );

    // -------------- get cities ------------------

    $this->repository->buildRepositoryModel(EntityType::PullmanDescription , []);
      
   
    
    $data['PullmanType']  = $this->repository->readRepository()->getAllBySelected(['pullmanDescriptionId','type']);  

    
    // -------------- return data ------------------     
       
            return $this->output->sendSuccess( $data , 'get all travel selector');
    }
}
    