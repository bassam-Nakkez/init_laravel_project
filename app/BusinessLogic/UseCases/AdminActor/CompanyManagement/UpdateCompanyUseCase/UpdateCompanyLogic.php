<?php
namespace App\BusinessLogic\UseCases\AdminActor\CompanyManagement\UpdateCompanyUseCase;


use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Core\Messages\ResponseMessages\SuccessMessage;
use App\BusinessLogic\Interfaces\ServicesInterfaces\ServicesInterface;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;

class UpdateCompanyLogic implements UseCase {

    
    public function __construct(
        //---------------------------------------------------------------------------------------
        private UpdateCompanyInput $input,  /*| Pass Request To Service*/
        //---------------------------------------------------------------------------------------
        private BaseRepositoryInterface $repository,    // for use FrameWork from business logic ---- frameWork 
        private PresenterInterface $output ,            // for present output to Views ---- Views
        private ServicesInterface $service               // frameWork services
    
    ){}
    
    // execute create entity service
    public function execute(): Result{
    
        
    

    $this->input->setPassword( $this->service->hashData($this->input->getPassword()));
    
    //Create Model
    $this->repository->buildRepositoryModel(EntityType::Company , []);
    
    //insert to dataBase

        
    $company = $this->repository->updateRepository()->update( $this->input->getCompanyId() , $this->input->toArray());
    
    
    // if model is not created
    if($company == null) return $this->output->sendFailed(null, ErrorMessage::$errorOccurred); 
        
    // return response  
    return $this->output->sendSuccess(
    (new UpdateCompanyOutput($company))->getOutputAsArray(),
            SuccessMessage::$UpdatedSuccessfully
        );
    
    
       
    }
    
    
}
