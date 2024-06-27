<?php
namespace App\BusinessLogic\UseCases\UserActor\GetDriverTravelUseCase;

use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;
use App\BusinessLogic\UseCases\UserActor\GetDriverTravelUseCase\GetDriverTravelOutput;


class GetDriverTravelLogic implements UseCase {


    public function __construct(
        //---------------------------------------------------------------------------------------
        private GetDriverTravelInput $input,  /*| Pass Request To Service*/
        //---------------------------------------------------------------------------------------
        private BaseRepositoryInterface $repository , // for use FrameWork from business logic ---- frameWork
        private PresenterInterface $output,          // for present output to Views ---- Views
    ){}


    public function execute() : Result {


        $this->repository->buildRepositoryModel(EntityType::EmployeeTravel , []);

        $condation = [
            "employeeId" => $this->input->getCompanyId(),
            "date" => $this->input->getDate(),

        ];

        // Get Travel from dataBase
        $employeeTravels = $this->repository->readRepository()->getDriverTravel($condation);


        if($employeeTravels == null )
        return $this->output->sendFailed(null , ErrorMessage::$NoSearchResult);

        return $this->output->sendSuccess((new GetDriverTravelOutput($employeeTravels->travels))->getDataAsObject() , 'Success');
        }
}
