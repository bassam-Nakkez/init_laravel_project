<?php
namespace App\BusinessLogic\UseCases\CompanyActor\ViewCompanyNotificationUseCase;


use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Interfaces\ServicesInterfaces\ServicesInterface;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;

class ViewCompanyNotificationLogic implements UseCase
{

    public function __construct(
        //---------------------------------------------------------------------------------------
        private ViewCompanyNotificationInput $input,  /*| Pass Request To Service*/
        //---------------------------------------------------------------------------------------
        private BaseRepositoryInterface $repository , // for use FrameWork from business logic ---- frameWork 
        private PresenterInterface $output,          // for present output to Views ---- Views
        private ServicesInterface $service           // frameWork services
    ){}
    
     
    public function execute() : Result { 
        
   
        $this->repository->buildRepositoryModel(EntityType::Company_Notification , []);

     //   $columns = ['avatar',"details","is_read" , "time"];

            $data = $this->repository->readRepository()
            ->getRecordsByValues( 'companyId', $this->input->getCompanyId());
            
            if($data == null )
            return $this->output->sendFailed(null , ErrorMessage::$someThingWentWrong);


            $this->repository->updateRepository()->updateAllRecords(['is_read'=>true] );

            return $this->output->sendSuccess( ( new ViewCompanyNotificationOutput( $data
            ))->getDataAsObject() , 'get all company\'s notifications ');
    }
}
    