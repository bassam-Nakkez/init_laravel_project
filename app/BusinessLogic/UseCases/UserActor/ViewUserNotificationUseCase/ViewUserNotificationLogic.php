<?php
namespace App\BusinessLogic\UseCases\UserActor\ViewUserNotificationUseCase;


use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Interfaces\ServicesInterfaces\ServicesInterface;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;

class ViewUserNotificationLogic implements UseCase
{

    public function __construct(
        //---------------------------------------------------------------------------------------
        private ViewUserNotificationInput $input,  /*| Pass Request To Service*/
        //---------------------------------------------------------------------------------------
        private BaseRepositoryInterface $repository , // for use FrameWork from business logic ---- frameWork 
        private PresenterInterface $output,          // for present output to Views ---- Views
        private ServicesInterface $service           // frameWork services
    ){}
    
     
    public function execute() : Result { 
        
   
        $this->repository->buildRepositoryModel(EntityType::User_Notification , []);

        $columns = ['content',"image","is_read" , "time"];

            $data = $this->repository->readRepository()
            ->getRecordsByConditions( $columns , ['userId'=>$this->input->getUserId()]);
            
            if($data == null )
            return $this->output->sendFailed(null , ErrorMessage::$someThingWentWrong);


            $this->repository->updateRepository()->updateAllRecords(['is_read'=>true] );

            return $this->output->sendSuccess( ( new ViewUserNotificationOutput( $data
            ))->getDataAsObject() , 'get all user\'s notifications ');
    }
}
    