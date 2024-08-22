<?php
namespace App\BusinessLogic\UseCases\CompanyActor\CompanyStatisticsUseCase;


use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Interfaces\ServicesInterfaces\ServicesInterface;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;

class CompanyStatisticsLogic implements UseCase {


    public function __construct(
        //---------------------------------------------------------------------------------------
        private CompanyStatisticsInput $input,  /*| Pass Request To Service*/
        //---------------------------------------------------------------------------------------
        private BaseRepositoryInterface $repository , // for use FrameWork from business logic ---- frameWork
        private PresenterInterface $output,
        private ServicesInterface $service    // helper functions
    ){}



public function execute() : Result {


        $this->repository->buildRepositoryModel(EntityType::Travel , []);


        // $revenues
        // $reservations 
        // $travels
        
        return $this->output->sendSuccess((new CompanyStatisticsOutput($data))->getOutputAsArray() , ErrorMessage::$ReservationSuccessfully);
        
    }
}
