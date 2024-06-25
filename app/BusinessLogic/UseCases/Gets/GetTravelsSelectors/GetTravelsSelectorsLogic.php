<?php
namespace App\BusinessLogic\UseCases\Gets\GetTravelsSelectors;


use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Interfaces\ServicesInterfaces\ServicesInterface;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;

class GetTravelsSelectorsLogic implements UseCase
{

    public function __construct(
        //---------------------------------------------------------------------------------------
        private GetTravelsSelectorsInput $input,  /*| Pass Request To Service*/
        //---------------------------------------------------------------------------------------
        private BaseRepositoryInterface $repository , // for use FrameWork from business logic ---- frameWork 
        private PresenterInterface $output,          // for present output to Views ---- Views
        private ServicesInterface $service           // frameWork services
    ){}
    
     public function execute() : Result {
    // ---------------- get series ----------------
    $this->repository->buildRepositoryModel(EntityType::Series, []);
    $seriesColumns = ['seriesId', 'seriesName'];
    $seriesOptions = $this->repository->readRepository()
        ->getRecordsByConditions($seriesColumns, ['companyId' => $this->input->getCompanyId()]);

    // -------------- get features ------------------
    $this->repository->buildRepositoryModel(EntityType::Feature, []);
    $featureColumns = ['featureId', 'feature'];
    $featureOptions = $this->repository->readRepository()
        ->getRecordsByConditions($featureColumns, ['companyId' => $this->input->getCompanyId()]);

    // -------------- get cities ------------------
    $this->repository->buildRepositoryModel(EntityType::City, []);
    $cityConditions = [['countryId', '=', $this->input->getCountry()]];
    $cities = $this->repository->readRepository()
        ->getRecordsByCustomQuery(['cityId', 'name'], $cityConditions);
    $fromOptions = [];
    $toOptions = [];
    foreach ($cities as $city) {
        $fromOptions[] = [
            'cityId' => $city->cityId,
            'name' => $city->name,
        ];
        $toOptions[] = [
            'cityId' => $city->cityId,
            'name' => $city->name,
        ];
    }

    // -------------- get pullmans ------------------
    $this->repository->buildRepositoryModel(EntityType::PullmanDescription, []);
    $pullmanOptions = $this->repository->readRepository()
        ->getAllBySelected(['pullmanDescriptionId', 'type']);

    // Structure data as expected by frontend
    $data = [
        'seriesOptions' => $seriesOptions,
        'featureOptions' => $featureOptions,
        'fromOptions' => $fromOptions,
        'toOptions' => $toOptions,
        'pullmanOptions' => $pullmanOptions,
    ];

    // -------------- return data ------------------
    return $this->output->sendSuccess($data, 'get all travel selector');
}
}
