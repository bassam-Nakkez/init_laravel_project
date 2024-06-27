<?php
namespace App\BusinessLogic\UseCases\DriverActor\SharePullmanLocation;

use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Interfaces\ServicesInterfaces\ServicesInterface;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;


class SharePullmanLocationLogic implements UseCase {




public function __construct(
    //---------------------------------------------------------------------------------------
    private SharePullmanLocationInput $input,  /*| Pass Request To Service*/
    //---------------------------------------------------------------------------------------
    private BaseRepositoryInterface $repository ,   // for use FrameWork from business logic ---- frameWork
    private PresenterInterface $output ,       // for present output to Views ---- Views
    private ServicesInterface $service           // frameWork services
 ){}


public function execute() : Result {


    //return $this->output->sendFailed(null,ErrorMessage::$AccountNotFound);

    $this->service->FireEventService()->sharePullmanLocation(
        $this->input->getLongitude() ,
         $this->input->getLatitude(),
        $this->input->getTravelId()
    );
    
  // return success response
    return $this->output->sendSuccess([$this->input->getLongitude() ,$this->input->getLatitude()],
        '...يـتم الآن مشــاركـةالـموقـع'
        );
    }



}

