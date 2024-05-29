<?php
namespace App\BusinessLogic\UseCases\AdminActor\CompanyManagement\AddCompanyUseCase;


use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Core\Messages\ResponseMessages\SuccessMessage;
use App\BusinessLogic\Interfaces\ServicesInterfaces\ServicesInterface;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;

class AddCompanyLogic implements UseCase {

    
    public function __construct(
        //---------------------------------------------------------------------------------------
        private AddCompanyInput $input,  /*| Pass Request To Service*/
        //---------------------------------------------------------------------------------------
        private BaseRepositoryInterface $repository,    // for use FrameWork from business logic ---- frameWork 
        private PresenterInterface $output ,            // for present output to Views ---- Views
        private ServicesInterface $service               // frameWork services
    
    ){}
    
    // execute create entity service
    public function execute(): Result{
    
        
    

    $this->input->setPassword( $this->service->hashData($this->input->getPassword()));


    // start transaction..

   $this->service->SqlServices()->startTransaction();

    //Create Model
    $this->repository->buildRepositoryModel(EntityType::Auth , []);
    
    //insert to dataBase
    $authInfo = $this->repository->createRepository()->create($this->input->authInfo());
        
        // if model is not created
        if($authInfo == null){
            $this->service->SqlServices()->rollbackTransaction();
            return $this->output->sendFailed(null, ErrorMessage::$errorOccurred); 
        } 

        
     //Create Model
    $this->repository->buildRepositoryModel(EntityType::Company , []);
    
    //insert to dataBase
    $company = $this->repository->createRepository()->create($this->input->companyInfo($authInfo->authId));
    
    // if model is not created
    if($company == null){
        $this->service->SqlServices()->rollbackTransaction();
        return $this->output->sendFailed(null, ErrorMessage::$errorOccurred); 
    } 

     $this->service->SqlServices()->commitTransaction();
        //return response  
     return $this->output->sendSuccess(
        (new AddCompanyOutput($company))->getDataAsObject(),
            SuccessMessage::$registerSuccessfully
        );
    
    }
    
    
}
