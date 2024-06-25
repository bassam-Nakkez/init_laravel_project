<?php
namespace App\BusinessLogic\UseCases\CompanyActor\ReservationManagement\CompanyReservationUseCase;


use App\BusinessLogic\Interfaces\Result;
use App\BusinessLogic\Core\Options\Gender;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Core\InternalInterface\UseCase;
use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;
use App\BusinessLogic\Interfaces\PresentersInterfaces\PresenterInterface;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;

class CompanyReservationLogic implements UseCase {


    public function __construct(
        //---------------------------------------------------------------------------------------
        private CompanyReservationInput $input,  /*| Pass Request To Service*/
        //---------------------------------------------------------------------------------------
        private BaseRepositoryInterface $travelRepository , // for use FrameWork from business logic ---- frameWork
        private BaseRepositoryInterface $reservationRepository , // for use FrameWork from business logic ---- frameWork
        private PresenterInterface $output,
    ){}

public function execute() : Result {


        $this->travelRepository->buildRepositoryModel(EntityType::Travel , []);

        $travel = $this->travelRepository->readRepository()->getById($this->input->getTravelId());

        $matrix = json_decode($travel->seatNumbers);

        $this->reservationRepository->buildRepositoryModel(EntityType::Passenger , []);

        $seats = array();

        foreach ($this->input->getMaleSeats() as $id) {
            if ($matrix[$id -1 ] != 0 ) {
                return $this->output->sendFailed(null , ErrorMessage::$AlreadyReservation);
            }

            array_push($seats , $id);
            $matrix[$id-1] = 2;
        }

        foreach ($this->input->getFemaleSeats() as $id) {
            if ($matrix[$id -1 ] != 0 ) {
                return $this->output->sendFailed(null , ErrorMessage::$AlreadyReservation);
            }
            
            array_push($seats , $id);
            $matrix[$id-1] = 1;
        }


        $data = $this->input->toArray();
        $data['seatsNumbers'] = json_encode($seats);

        $reservation = $this->reservationRepository->createRepository()->create($data);

        if ($reservation == null) {
           return $this->output->sendFailed(null , ErrorMessage::$WrongReservation);
        }
        $travel->seatNumbers = json_encode($matrix);
        $travel->save();

        return $this->output->sendSuccess((new CompanyReservationOutput($data))->getOutputAsArray() , ErrorMessage::$ReservationSuccessfully);

    }
}
