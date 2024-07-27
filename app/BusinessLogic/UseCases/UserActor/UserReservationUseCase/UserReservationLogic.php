<?php
namespace App\BusinessLogic\UseCases\UserActor\UserReservationUseCase;

use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\Gender;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Interfaces\ServicesInterfaces\ServicesInterface;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;

class UserReservationLogic implements UseCase {


    public function __construct(
        //---------------------------------------------------------------------------------------
        private UserReservationInput $input,  /*| Pass Request To Service*/
        //---------------------------------------------------------------------------------------
        private BaseRepositoryInterface $travelrepository , // for use FrameWork from business logic ---- frameWork
        private BaseRepositoryInterface $reservationrepository , // for use FrameWork from business logic ---- frameWork
        private PresenterInterface $output,
        private ServicesInterface $service               // frameWork services

    ){}


    public function execute() : Result {


        $this->travelrepository->buildRepositoryModel(EntityType::Travel , []);

        $travel = $this->travelrepository->readRepository()->getById($this->input->getTravelId());

        $matrix = json_decode($travel->seatNumbers);

        $this->reservationrepository->buildRepositoryModel(EntityType::Reservation , []);

        foreach ($this->input->getMatrix() as $value) {
            if ($matrix[$value["seteIndex"]] != 0 ) {
                return $this->output->sendFailed(null , ErrorMessage::$AlreadyReservation);
            }

            $reservation = $this->reservationrepository->createRepository()->create([
                "userId" => $this->input->getUserId(),
                "travelId" => $this->input->getTravelId(),
                "station" => $this->input->getStation(),
                "seteIndex" => $value["seteIndex"],
                "gendor" => $value["gendor"]
            ]);

            if (!$reservation) {
                return $this->output->sendFailed(null , ErrorMessage::$WrongReservation);            }

            if($value["gendor"] == Gender::male->value)
            {
                $matrix[$value["seteIndex"]] = 2;
            }
            else{
            $matrix[$value["seteIndex"]] = 1;
            }
        }

        $travel->seatNumbers = json_encode($matrix);

        $travel->save();
        $data =[ 
            'content' =>'مرحباً تم الححز الرحلة  بنجــاح الرجاء التقيد بالوعد و الحضور قبل نصف ساعة من موعد الانطلاق  ',
            'image' => 'https://cdn-icons-png.flaticon.com/512/7041/7041760.png',
            'time'=> date('Y-m-d'),
         ];
        
        $this->service->FireEventService()->publicEvent('my-channel' ,'public-event', $data);

        return $this->output->sendSuccess((new UserReservationOutput(true))->getOutputAsArray() , ErrorMessage::$ReservationSuccessfully);

    }
}
