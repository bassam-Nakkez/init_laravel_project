<?php
namespace App\BusinessLogic\UseCases\CompanyActor\GetTravelMatrixUseCase;

use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;
use App\BusinessLogic\UseCases\CompanyActor\GetTravelMatrixUseCase\logic\GetMatrixAlogrithm;


class GetTravelMatrixWebLogic implements UseCase {


    public function __construct(
        //---------------------------------------------------------------------------------------
        private GetTravelMatrixWebInput $input,  /*| Pass Request To Service*/
        //---------------------------------------------------------------------------------------
        private BaseRepositoryInterface $repository , // for use FrameWork from business logic ---- frameWork
        private PresenterInterface $output,
    ){}


    public function execute() : Result {


        $this->repository->buildRepositoryModel(EntityType::Travel , []);

        $travel = $this->repository->readRepository()->getById($this->input->getTravelId());

        $company = $travel->company;

        // if($company->isSeparateGender)
        // {

            $seatNumbers = json_decode($travel->seatNumbers);

            $matrix = GetMatrixAlogrithm::getMatrixAlogrithm($seatNumbers);

            return $this->output->sendSuccess((new GetTravelMatrixWebOutput($matrix))->getOutputAsArray() , 'Success');
        // }
        // else
        // {
        //     return $this->output->sendSuccess(json_decode($travel->seatNumbers) , 'Success');
        // }

            return $this->output->sendFailed(null,ErrorMessage::$filedGetTravelMatrix);




    }
}
