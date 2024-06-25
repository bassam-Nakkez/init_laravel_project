<?php
namespace App\BusinessLogic\UseCases\CompanyActor\TravelsManagement\GetTravelsByFiltersUseCase;

use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Interfaces\ServicesInterfaces\ServicesInterface;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;

class GetTravelsByFiltersLogic implements UseCase {


    public function __construct(
        //---------------------------------------------------------------------------------------
        private GetTravelsByFiltersInput $input,  /*| Pass Request To Service*/
        //---------------------------------------------------------------------------------------
        private BaseRepositoryInterface $repository , // for use FrameWork from business logic ---- frameWork
        private PresenterInterface $output,          // for present output to Views ---- Views
        private ServicesInterface $service           // frameWork services
    ){}


    public function execute() : Result {


        $this->repository->buildRepositoryModel(EntityType::Travel , []);

        // filter by cities
        $conditionsValues['from'] = $this->input->getFrom(); // where like condition
        $conditionsValues['to']   = $this->input->getTo();   // where like condition

        // filter by date
        $conditionsValues['travelDate'] = $this->input->getDate(); // where Date Condition


        // filter by companies
        $conditionsValues['companyId']  = $this->input->companyId(); 

        // filter by VIP
        $conditionsValues['isVIP']  =  $this->input->getIsVIP();


        // filter by station
        if($this->input->getStationId() != null ){
            $conditionsValues['stationId']  =  $this->input->getStationId() ;
        }

        // order result by :
        $orderByColumns =   ['recommendation'] ; // ase

        


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
        $travels = $this->repository->readRepository()-> getTravelsByFiltersWithExpired(
            $selectFromTravel  ,$conditionsValues , $this->input->isExpired() );


        if($travels == null )
        return $this->output->sendFailed(null , ErrorMessage::$NoSearchResult);

        return $this->output->sendSuccess((new GetTravelsByFiltersOutput($travels))->getDataAsObject() , 'Success');
        }
}
