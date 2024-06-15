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

        $attri = [
            "userId"=>$this->input->getUserId(),
            "operation" => ">=",
            "travelDate" => $this->input->getDate()
        ];
        // Get Travel from dataBase
        $currenttravels = $this->repository->readRepository()->getUserTravel($attri);

        $this->repository->buildRepositoryModel(EntityType::Travel , []);
        $attri = [
            "userId"=>$this->input->getUserId(),
            "operation" => "<",
            "travelDate" => $this->input->getDate()
        ];
        $historytravels = $this->repository->readRepository()->getUserTravel($attri);


        return $this->output->sendSuccess((new GetHistoryCurrentTravelOutput($currenttravels,$historytravels))->getOutputAsArray() , 'Success');
        }
}
