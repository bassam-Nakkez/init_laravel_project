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


    $this->service->SqlServices()->startTransaction();

    //Create Model
    $this->repository->buildRepositoryModel(EntityType::Company , []);
    $company  = $this->repository->readRepository()->getFirstModelByValue('companyId',$this->input->getCompanyId());
    
    if($company == null){
        return $this->output->sendFailed(null, ErrorMessage::$someThingWentWrong); 
    }
    
    $authId =  $company->authId;
    

    if($this->input->getNewData() != [])
    {
    //insert to dataBase
    $company = $this->repository->updateRepository()->update( $this->input->getCompanyId() , $this->input->getNewData());
    
    }
    
    // if model is not created
    if($company == null){
        $this->service->SqlServices()->rollbackTransaction();
        return $this->output->sendFailed(null, ErrorMessage::$someThingWentWrong); 
    }

    $authInfo = $this->input->getAuthInfo();
    
    if($authInfo != []){

      if( isset($authInfo['password'])){
            $authInfo['password']= $this->service->hashData( $authInfo['password']);
        }

     //Create Model
    $this->repository->buildRepositoryModel(EntityType::Auth , []);
    
    //insert to dataBase
    $result = $this->repository->updateRepository()->update( $authId , $this->input->getAuthInfo());
    if($result == null){
        $this->service->SqlServices()->rollbackTransaction();
        return $this->output->sendFailed(null, ErrorMessage::$someThingWentWrong); } 
}

    $this->service->SqlServices()->commitTransaction();
    // return response  
    return $this->output->sendSuccess(
    (new UpdateCompanyOutput($company))->getDataAsObject(),
            SuccessMessage::$UpdatedSuccessfully
    );
       
    }
    
    
}
