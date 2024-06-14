<?php
namespace App\BusinessLogic\UseCases\UserActor\GetComanyTravelUseCase;

use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Interfaces\ServicesInterfaces\ServicesInterface;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;

class GetComanyTravelLogic implements UseCase {


    public function __construct(
        //---------------------------------------------------------------------------------------
        private GetComanyTravelInput $input,  /*| Pass Request To Service*/
        //---------------------------------------------------------------------------------------
        private BaseRepositoryInterface $repository , // for use FrameWork from business logic ---- frameWork
        private PresenterInterface $output,          // for present output to Views ---- Views
    ){}


    public function execute() : Result {


        $this->repository->buildRepositoryModel(EntityType::Travel , []);

        $condation = [
            "companyId" => $this->input->getCompanyId()
        ];

        // Get Travel from dataBase
        $travels = $this->repository->readRepository()->getModelsByWhere($condation);


        if($travels == null )
        return $this->output->sendFailed(null , ErrorMessage::$NoSearchResult);

        return $this->output->sendSuccess((new GetComanyTravelOutput($travels))->getDataAsObject() , 'Success');
        }
}
