<?php
namespace App\BusinessLogic\UseCases\CompanyActor\SeriesManagement\CreateSeriesUseCase;

use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Core\Messages\ResponseMessages\SuccessMessage;
use App\BusinessLogic\Interfaces\ServicesInterfaces\ServicesInterface;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;

class CreateSeriesLogic implements UseCase {


    public function __construct(
        //---------------------------------------------------------------------------------------
        private CreateSeriesInput $input,  /*| Pass Request To Service*/
        //---------------------------------------------------------------------------------------
        private BaseRepositoryInterface $repository , // for use FrameWork from business logic ---- frameWork
        private PresenterInterface $output,          // for present output to Views ---- Views
        private ServicesInterface $service           // frameWork services
    ){}


    public function execute() : Result {
        
       // start transaction
        $this->service->SqlServices()->startTransaction();

        $this->repository->buildRepositoryModel(EntityType::Series , []);

        $series = $this->repository->createRepository()->create([
            'seriesName'    => $this->input->getSeriesName(),
            'companyId'     => $this->input->getCompanyId(),
        ]);

        if($series == null ){ 
        $this->service->SqlServices()->rollbackTransaction();
       return $this->output->sendFailed(null , ErrorMessage::$ConnectionProblem);
        }
        
       $this->repository->buildRepositoryModel(EntityType::Station , []);
       $stations = $this->input->getStations();
        foreach( $stations as $station ){
           
            $result = $this->repository->createRepository()->create([
                "name"      => $this->input-> getSeriesName(),
                "city"      => $this->input->getCity(),
                "companyId" =>$this->input->getCompanyId(),
                'seriesId'  => $series->seriesId ,
                'ExpectedArrivalTime' => $station['ExpectedArrivalTime'],
               ]);
               
            if($result == null ){ 
            $this->service->SqlServices()->rollbackTransaction();
            return $this->output->sendFailed(null , ErrorMessage::$ConnectionProblem);
        }

        }
        // commit transaction
        $this->service->SqlServices()->commitTransaction();
        return $this->output->sendSuccess([(new CreateSeriesOutput($series))->getDataAsObject()] , SuccessMessage::$createdSuccessfully);

    }
}
