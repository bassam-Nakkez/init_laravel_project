<?php
namespace App\BusinessLogic\UseCases\Gets\GetUserChannels;


use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Interfaces\ServicesInterfaces\ServicesInterface;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;

class GetUserChannelsLogic implements UseCase
{

    public function __construct(
        //---------------------------------------------------------------------------------------
        private GetUserChannelsInput $input,  /*| Pass Request To Service*/
        //---------------------------------------------------------------------------------------
        private BaseRepositoryInterface $repository , // for use FrameWork from business logic ---- frameWork
        private PresenterInterface $output,          // for present output to Views ---- Views
        private ServicesInterface $service           // frameWork services
    ){}


    public function execute() : Result {


        $this->repository->buildRepositoryModel(EntityType::UserChannel , []);

        $columns = ['name',"event"];

            $data = $this->repository->readRepository()
            ->getRecordsByConditions( $columns , ['userId'=>$this->input->getUserId()]);

            if($data == null )
            return $this->output->sendFailed(null , ErrorMessage::$someThingWentWrong);



            return $this->output->sendSuccess( ( new GetUserChannelsOutput( $data
            ))->getDataAsObject() , 'get all user\'s channels ');
    }
}
