<?php
namespace App\BusinessLogic\UseCases\UserActor\TravelFollowUseCase;


use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;


class TravelFollowLogic implements UseCase {


    public function __construct(
        //---------------------------------------------------------------------------------------
        private TravelFollowInput $input,  /*| Pass Request To Service*/
        //---------------------------------------------------------------------------------------
        private BaseRepositoryInterface $repository , // for use FrameWork from business logic ---- frameWork
        private PresenterInterface $output,
    ){}


    public function execute() : Result {


        $this->repository->buildRepositoryModel(EntityType::TravelFollow , []);


        $condation = ["userId" => $this->input->getUserId() , "travelId" => $this->input->getTravelId()];

        $follow = $this->repository->readRepository()->getModelByWhere($condation);

        if ( !$follow ) {
            return ($this->repository->createRepository()->create($condation))?
            $this->output->sendSuccess((new TravelFollowOutput())->getOutputAsArray() , ErrorMessage::$SuccessFowllow)
            :$this->output->sendFailed(null,ErrorMessage::$followFiled);
            ;
        }
        else
        {
            return ($this->repository->deleteRepository()->delete($follow->travelFollowId))?
            $this->output->sendSuccess((new TravelFollowOutput())->getOutputAsArray() , ErrorMessage::$unSuccessFowllow)
            :$this->output->sendFailed(null,ErrorMessage::$unfollowFiled);
        }


    }
}
