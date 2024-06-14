<?php
namespace App\BusinessLogic\UseCases\UserActor\GetHistoryCurrentTravelUseCase;

use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;

class GetHistoryCurrentTravelLogic implements UseCase {


    public function __construct(
        //---------------------------------------------------------------------------------------
        private GetHistoryCurrentTravelInput $input,  /*| Pass Request To Service*/
        //---------------------------------------------------------------------------------------
        private BaseRepositoryInterface $repository , // for use FrameWork from business logic ---- frameWork
        private PresenterInterface $output,          // for present output to Views ---- Views
    ){}


    public function execute() : Result {


        $this->repository->buildRepositoryModel(EntityType::Travel , []);

        // Get Travel from dataBase
        $currenttravels = $this->repository->readRepository()->getModelByValue('userId',"=",$this->input->getUserId());
        $currenttravels = $this->repository->readRepository()->getModelByValue('travelDate',">=",$this->input->getDate());

        $this->repository->buildRepositoryModel(EntityType::Travel , []);
        $historytravels = $this->repository->readRepository()->getModelByValue('userId',"=",$this->input->getUserId());
        $historytravels = $this->repository->readRepository()->getModelByValue('travelDate',"<",$this->input->getDate());


        return $this->output->sendSuccess((new GetHistoryCurrentTravelOutput($currenttravels,$historytravels))->getOutputAsArray() , 'Success');
        }
}
