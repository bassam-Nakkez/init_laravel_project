<?php
namespace App\BusinessLogic\UseCases\UserActor\GetHistoryCurrentTravelUseCase;

use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
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


        $this->repository->buildRepositoryModel(EntityType::Reservation , []);

        $attri = [
            "userId"=>$this->input->getUserId(),
            "operation" => ">=",
            "travelDate" => $this->input->getDate()
        ];
        
        // Get Travel from dataBase
        $currenttravels = $this->repository->readRepository()->getUserTravel($attri);

        $result = array();
        foreach( $currenttravels as  $reservation){
            
            if ( $reservation['travel'] !=null)
            {
                $travel =  $reservation['travel'];
                $travel['station'] = $reservation['station'];
                $travel['numberOfTraveller'] = $reservation['seteIndex'] ;
                array_push($result,$travel);
            }
            
           
        }
      

        $this->repository->buildRepositoryModel(EntityType::Reservation , []);
        $attri = [
            "userId"=>$this->input->getUserId(),
            "operation" => "<",
            "travelDate" => $this->input->getDate()
        ];
        $historytravels = $this->repository->readRepository()->getUserTravel($attri);

        
       
        $historyResult = array();
        foreach( $historytravels as  $reservation){
            
            if ( $reservation['travel'] !=null)
            {
               

                $travel =  $reservation['travel'];
                $travel['station'] = $reservation['station'];
                $travel['numberOfTraveller'] = $reservation['seteIndex'] ;
                array_push($historyResult,$travel);
            }
            
           
        }


        return $this->output->sendSuccess((new GetHistoryCurrentTravelOutput($result,$historyResult))->getOutputAsArray() , 'Success');
        }
}
