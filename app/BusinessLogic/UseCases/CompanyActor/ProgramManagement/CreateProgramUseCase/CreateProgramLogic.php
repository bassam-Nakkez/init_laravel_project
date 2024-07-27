<?php
namespace App\BusinessLogic\UseCases\CompanyActor\ProgramManagement\CreateProgramUseCase;
use App\Http\Models\TravelFeatures;
use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Interfaces\EntityInterfaces\TravelEntity;
use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Interfaces\ServicesInterfaces\ServicesInterface;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;

class CreateProgramLogic implements UseCase {



    public function __construct(
      //---------------------------------------------------------------------------------------
      private CreateProgramInput $input,  /*| Pass Request To Service*/
      //---------------------------------------------------------------------------------------
      private BaseRepositoryInterface $repository ,   // for use FrameWork from business logic ---- frameWork
      private PresenterInterface $output,             // for present output to Views ---- Views
      private ServicesInterface $service              // frameWork services
   ){}


  public function execute() : Result {

    // check if end date greater than or equals start date?
    if($this->service->DateServices()->dateGreaterThanOrEquals($this->input->getStartDate() , $this->input->getEndDate() ) )
    return $this->output->sendFailed(null , ' تـاريخ النـهاية يســبق تاريـخ البـداية الرجـاء ادخـال معلومات صالحة');



    // calculate count of day between start and end date
    $days = $this->service->DateServices()->getDaysBetween($this->input->getStartDate() , $this->input->getEndDate());


    // try {

    $program_data = $this->input->toArray();

    // check if from equals to ?
    if($program_data['from'] == $program_data['to'] )
    return $this->output->sendFailed(null , 'الرجـاء اختيـار  وجـهة مخـتلفة عـن منطقة الانطلاق');

    $week_days = $this->input->week_days();

    $dateOfday = $this->input->getStartDate();

    $this->service->SqlServices()->startTransaction(); // begin Transaction


    $this->repository->buildRepositoryModel(EntityType::Program , []);


    $program = $this->repository->createRepository()->create($program_data);

    if( $program == null )  {
        $this->service->SqlServices()->rollbackTransaction();
        return $this->output->sendFailed( $program , ErrorMessage::$someThingWentWrong);
    }

    $travelsInsert = array();
    $features = array();
    $pullmanInformation = null  ;
    // for every day in program
    for($i= 1 ; $i <= $days ; $i++)
    {

    $nameOfday = $this->service->DateServices()->getDayName( $dateOfday , $format = 'Y-m-d') ;
    $dayTravels = $week_days[$nameOfday];

    if( !$dayTravels == null)
    {
        $dailySerialNumber = 0;
    foreach ($dayTravels as $travel )
    {
        $dailySerialNumber ++;


    if( $pullmanInformation == null || $pullmanInformation['pullmanDescriptionId'] != $travel['pullmanDescriptionId']){
        $this->repository->buildRepositoryModel(EntityType::PullmanDescription ,[]);
        $pullmanInformation = $this->repository->readRepository()->getById($travel['pullmanDescriptionId']);
        if( $pullmanInformation == null )  {
            $this->service->SqlServices()->rollbackTransaction();
            return $this->output->sendFailed( $travel , ErrorMessage::$someThingWentWrong);
        }
    }
    $features = $travel['features'];
    unset($travel['features']);
    $travelInformation = $travel;
    $travelInformation['from'] = $program_data['from'];
    $travelInformation['to'] = $program_data['to'];
    $travelInformation['programId'] = $program->programId;
    $travelInformation['companyId'] = $program->companyId;
    $travelInformation['travelDate'] =  $dateOfday;
    $travelInformation['available'] = true;
    $travelInformation['numOfSeatsBooking'] = 0;
    $travelInformation['numOfSeats'] = $pullmanInformation['numOfSeats'];
    $travelInformation['seatNumbers'] = json_encode(array_fill(0,47,0));
    $travelInformation['day'] = $nameOfday;
    $travelInformation['DailySerialNumber'] = $dailySerialNumber;


    $this->repository->buildRepositoryModel(EntityType::Travel , []);
    $travel = $this->repository->createRepository()->create($travelInformation);
    if( $travel == null ) {
        $this->service->SqlServices()->rollbackTransaction();
        return $this->output->sendFailed( $travel , ErrorMessage::$someThingWentWrong);
    }



    foreach ($features as $featureId )
    {

        $this->repository->buildRepositoryModel(EntityType::TravelFeature , []);

        $feature = $this->repository->createRepository()->create(['featureId'=> $featureId  , 'travelId'=> $travel->travelId]);
        if( $feature == null ) {
          $this->service->SqlServices()->rollbackTransaction();
          return $this->output->sendFailed( $feature , ErrorMessage::$someThingWentWrong);
      }
    }
    // array_push($travelsInsert ,$travelInformation);

}
       }
    $dateOfday = $this->service->DateServices()->getNextDay( $dateOfday);
 }






    $this->service->SqlServices()->commitTransaction(); // commit Transaction
    return $this->output->sendSuccess( (new CreateProgramOutput($program))->getDataAsObject() , ' تــم انـشاء البرنامج بـنجاح');



    }
}

