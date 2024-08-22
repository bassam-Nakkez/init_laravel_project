<?php
namespace App\BusinessLogic\UseCases\CompanyActor\ProgramManagement\ViewProgramsUseCase;


use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Interfaces\ServicesInterfaces\ServicesInterface;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;

class ViewProgramsLogic implements UseCase
{

    public function __construct(
        //---------------------------------------------------------------------------------------
        private ViewProgramsInput $input,  /*| Pass Request To Service*/
        //---------------------------------------------------------------------------------------
        private BaseRepositoryInterface $repository , // for use FrameWork from business logic ---- frameWork 
        private PresenterInterface $output,          // for present output to Views ---- Views
        private ServicesInterface $service           // frameWork services
    ){}
    
     
    public function execute() : Result { 
        
   
        $this->repository->buildRepositoryModel(EntityType::Program , []);

        $columns = [        
        "from",
        "to",
        'start',
        'end',
    ];
            $data = $this->repository->readRepository()
            ->getRecordsByConditions( $columns , ['companyId'=>$this->input->getCompanyId()]);

            return $this->output->sendSuccess( $data , 'get all Programs');
    }
}
    