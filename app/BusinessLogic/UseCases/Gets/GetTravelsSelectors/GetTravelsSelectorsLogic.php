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

          $data['seriesOptions'] = $this->repository->readRepository()
            ->getRecordsByConditions( $columns , ['companyId'=>$this->input->getCompanyId()]);

    // -------------- get features ------------------
            $this->repository->buildRepositoryModel(EntityType::Feature , []);

            $columns = ['featureId',"feature"];
    
            $data['FeatureOptions']  = $this->repository->readRepository()
                ->getRecordsByConditions( $columns , ['companyId'=>$this->input->getCompanyId()]);
    
    // -------------- get cities ------------------

    $this->repository->buildRepositoryModel(EntityType::City , []);
        
    $conditions = [
        ['countryId','=', $this->input->getCountry()]
    ];
    
    $data['fromOptions']  = $this->repository->readRepository()->getRecordsByCustomQuery(['cityId',"name"] ,$conditions   );
    $data['toOptions'] = $data['fromOptions'];
    // -------------- get cities ------------------

    $this->repository->buildRepositoryModel(EntityType::PullmanDescription , []);
      
   
    
    $data['PullmanOptions']  = $this->repository->readRepository()->getAllBySelected(['pullmanDescriptionId','type']);  

    
    // -------------- return data ------------------     
       
    $succ = Array();
    array_push($succ ,  $data  );

            return $this->output->sendSuccess( $succ , 'get all travel selector');
    }
}
    