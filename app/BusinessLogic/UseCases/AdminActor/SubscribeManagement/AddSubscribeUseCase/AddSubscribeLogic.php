<?php
namespace App\BusinessLogic\UseCases\AdminActor\SubscribeManagement\AddSubscribeUseCase;

use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Core\Messages\ResponseMessages\SuccessMessage;
use App\BusinessLogic\Interfaces\ServicesInterfaces\ServicesInterface;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;

class AddSubscribeLogic implements UseCase {

    
    public function __construct(
        //---------------------------------------------------------------------------------------
        private AddSubscribeInput $input,  /*| Pass Request To Service*/
        //---------------------------------------------------------------------------------------
        private BaseRepositoryInterface $repository , // for use FrameWork from business logic ---- frameWork 
        private PresenterInterface $output,          // for present output to Views ---- Views
        private ServicesInterface $service           // frameWork services
    ){}
    
     
    public function execute() : Result { 
        

        $this->repository->buildRepositoryModel(EntityType::Subscribe , []);

        if ($this->repository->readRepository()->existsRecord(['name'=> $this->input->getName()] ))
        return $this->output->sendFailed(null , ErrorMessage::$ExistsSubscribe);


        $result = $this->repository->createRepository()->create($this->input->toArray());
        
        if($result == null )
        return $this->output->sendFailed(null , ErrorMessage::$ConnectionProblem);

        return $this->output->sendSuccess((new AddSubscribeOutput($result))->getDataAsObject() , SuccessMessage::$addedSuccessfully);

    }
}
    