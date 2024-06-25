<?php
namespace App\BusinessLogic\UseCases\CompanyActor\PostManagement\DeletePostUseCase;

use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Core\Messages\ResponseMessages\SuccessMessage;
use App\BusinessLogic\Interfaces\ServicesInterfaces\ServicesInterface;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;

class DeletePostLogic implements UseCase {

    
    public function __construct(
        //---------------------------------------------------------------------------------------
        private DeletePostInput $input,  /*| Pass Request To Service*/
        //---------------------------------------------------------------------------------------
        private BaseRepositoryInterface $repository, // for use FrameWork from business logic ---- frameWork 
        private PresenterInterface $output,          // for present output to Views ---- Views
        private ServicesInterface $service           // frameWork services
    ){}
    
     
    public function execute() : Result { 
        
        
        $this->repository->buildRepositoryModel(EntityType::Post , ['stationId'=> $this->input->getPostId()]);
        try{ 
            $result = $this->repository->deleteRepository()->delete($this->input->getPostId());
         
        }catch( \Throwable $e)
        {
            return $this->output->sendFailed(null , 'العنصر غير موجود');

        }
        if(!$result)
        return $this->output->sendFailed(null , ErrorMessage::$ConnectionProblem);

        return $this->output->sendSuccess($result , SuccessMessage::$DeletedSuccessfully);
    }
}
    