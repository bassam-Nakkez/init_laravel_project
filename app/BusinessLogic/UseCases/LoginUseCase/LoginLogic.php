<?php
namespace App\BusinessLogic\UseCases\LoginUseCase;

use App\BusinessLogic\Core\Constent;
use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Interfaces\EntityInterfaces\AuthEntity;
use App\BusinessLogic\Interfaces\EntityInterfaces\RoleEntity;
use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Core\Messages\ResponseMessages\SuccessMessage;
use App\BusinessLogic\Interfaces\ServicesInterfaces\ServicesInterface;
use App\BusinessLogic\Core\Messages\ValidationMessages\ValidationMessage;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;

class LoginLogic implements UseCase {

    

    
public function __construct(
    //---------------------------------------------------------------------------------------
    private LoginInput $input,  /*| Pass Request To Service*/
    //---------------------------------------------------------------------------------------
    private BaseRepositoryInterface $repository ,   // for use FrameWork from business logic ---- frameWork 
    private PresenterInterface $output ,       // for present output to Views ---- Views
    private ServicesInterface $service           // frameWork services
 ){}

 
public function execute() : Result {
    
    // create model
    $this->repository->buildRepositoryModel(EntityType::Auth ,[]);
    $authInfo = $this->repository->readRepository()->getFirstModelByValue(Constent::$EMAIL , $this->input->getEmail());
    

    // return $admin->admin->
    if($authInfo instanceof RoleEntity ){ 

    //compare password
    if(!$this->service->checkPassword([
        "password"       => $this->input->getPassword(),
        "hashedPassword" => $authInfo->getPassword()
    ]))return $this->output->sendFailed(null,ValidationMessage::$IncorrectPassword);

    // create token
    $token = $this->service->getToken($authInfo);
    
    $type = [ EntityType::Admin  , EntityType::Company , EntityType::Employee ];
    
    $this->repository->buildRepositoryModel($type[$authInfo->type],[]);
    
    $entity = $this->repository->readRepository()->getFirstModelByValue(constent::$AuthID , $authInfo->authId );
    $entity ['token'] = $token; 
    $entity ['role'] = $authInfo->type; 
    
  // return success response
    return $this->output->sendSuccess(
        (new LoginOutput($entity ))->getDataAsObject(),
       SuccessMessage::$loginSuccessfull
        );
    }
    return $this->output->sendFailed(null,ErrorMessage::$AccountNotFound);
  }


}

