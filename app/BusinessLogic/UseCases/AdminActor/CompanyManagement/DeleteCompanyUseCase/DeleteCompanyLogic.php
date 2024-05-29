<?php
namespace App\BusinessLogic\UseCases\AdminActor\CompanyManagement\DeleteCompanyUseCase;

use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Core\Messages\ResponseMessages\SuccessMessage;
use App\BusinessLogic\Interfaces\ServicesInterfaces\ServicesInterface;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\UseCases\CompanyActor\StationsManagement\StationOutput;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;

class DeleteCompanyLogic implements UseCase {

    
    public function __construct(
        //---------------------------------------------------------------------------------------
        private DeleteCompanyInput $input,  /*| Pass Request To Service*/
        //---------------------------------------------------------------------------------------
        private BaseRepositoryInterface $repository, // for use FrameWork from business logic ---- frameWork 
        private PresenterInterface $output,          // for present output to Views ---- Views
        private ServicesInterface $service           // frameWork services
    ){}
    
     
    public function execute() : Result { 
        
        $this->service->SqlServices()->startTransaction();
        $this->repository->buildRepositoryModel(EntityType::Company , ['companyId'=> $this->input->getCompanyId()]);

        $company  = $this->repository->readRepository()->getFirstModelByValue('companyId',$this->input->getCompanyId());
        $authId =  $company->authId;
        $result = $this->repository->deleteRepository()->delete($this->input->getCompanyId());
        if(!$result){
            $this->service->SqlServices()->rollbackTransaction();
            return $this->output->sendFailed(null , ErrorMessage::$someThingWentWrong);
        }

        $this->repository->buildRepositoryModel(EntityType::Auth , ['companyId'=> $this->input->getCompanyId()]);
        $result = $this->repository->deleteRepository()->delete($authId);

        if(!$result){
            $this->service->SqlServices()->rollbackTransaction();
            return $this->output->sendFailed(null , ErrorMessage::$ConnectionProblem);
        }

        $this->service->SqlServices()->commitTransaction();
        return $this->output->sendSuccess($result , SuccessMessage::$DeletedSuccessfully);

        
    }
}
    