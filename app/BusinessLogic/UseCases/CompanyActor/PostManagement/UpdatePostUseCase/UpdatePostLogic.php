<?php
namespace App\BusinessLogic\UseCases\CompanyActor\PostManagement\UpdatePostUseCase;

use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Core\Messages\ResponseMessages\SuccessMessage;
use App\BusinessLogic\Interfaces\ServicesInterfaces\ServicesInterface;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;

class UpdatePostLogic implements UseCase {

    
    public function __construct(
        //---------------------------------------------------------------------------------------
        private UpdatePostInput $input,  /*| Pass Request To Service*/
        //---------------------------------------------------------------------------------------
        private BaseRepositoryInterface $repository , // for use FrameWork from business logic ---- frameWork 
        private PresenterInterface $output,          // for present output to Views ---- Views
        private ServicesInterface $service           // frameWork services
    ){}
    
     
    public function execute() : Result { 
        

        $newData = [];

        if($this->input->getImage() != null)
        $newData['image']= $this->input->getImage();

        if($this->input->getContent() != null)
        $newData['content']= $this->input->getContent();

        $this->repository->buildRepositoryModel(EntityType::Post , []);

        $result = $this->repository->updateRepository()->update($this->input->getPostId() , $newData);
        
        if(!$result)
        return $this->output->sendFailed(null , ErrorMessage::$ConnectionProblem);

        return $this->output->sendSuccess($result , SuccessMessage::$UpdatedSuccessfully);

    }
}
    