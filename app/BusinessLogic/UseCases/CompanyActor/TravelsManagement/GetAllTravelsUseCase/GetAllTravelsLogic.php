<?php
namespace App\BusinessLogic\UseCases\CompanyActor\TravelsManagement\GetAllTravelsUseCase;

use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Interfaces\ServicesInterfaces\ServicesInterface;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;

class GetAllTravelsLogic implements UseCase {


    public function __construct(
        //---------------------------------------------------------------------------------------
        private GetAllTravelsInput $input,  /*| Pass Request To Service*/
        //---------------------------------------------------------------------------------------
        private BaseRepositoryInterface $repository , // for use FrameWork from business logic ---- frameWork
        private PresenterInterface $output,          // for present output to Views ---- Views
        private ServicesInterface $service           // frameWork services
    ){}


    public function execute() : Result {


        $this->repository->buildRepositoryModel(EntityType::Travel , []);


        // selected columns from travel table
        $selectFromTravel = [
            'travelId',
            'from',
            'to',
            'travelDate',
            'timeToLeave',
            'price',
            'numOfSeats',
            'numOfSeatsBooking',
            'available',
            'isVIP',
            'periodName',
            'companyId',
        ];

        

        // Get Travel from dataBase
        $travels = $this->repository->readRepository()->
         getAllTravelsWithExpired(
            $selectFromTravel  ,$this->input->companyId() ,$this->input->getDate() , $this->input->isExpired());


        if($travels == null )
        return $this->output->sendFailed(null , ErrorMessage::$NoSearchResult);

        return $this->output->sendSuccess((new GetAllTravelsOutput($travels))->getDataAsObject() , 'Success');
        }
}
