<?php
namespace App\BusinessLogic\UseCases\CompanyActor\PostManagement\ViewPostUseCase;


use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;


class ViewPostLogic implements UseCase {


    public function __construct(
        //---------------------------------------------------------------------------------------
        private ViewPostInput $input,  /*| Pass Request To Service*/
        //---------------------------------------------------------------------------------------
        private BaseRepositoryInterface $repository , // for use FrameWork from business logic ---- frameWork
        private PresenterInterface $output,
    ){}


    public function execute() : Result {


        $this->repository->buildRepositoryModel(EntityType::Post , []);

        $condation = ["companyId" => $this->input->getCompanyId()];

        $posts = $this->repository->readRepository()->getModelsByWhere($condation);

        return $this->output->sendSuccess($posts , 'Success');



    }
}
