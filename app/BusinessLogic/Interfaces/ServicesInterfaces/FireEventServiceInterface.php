<?php
namespace App\BusinessLogic\Interfaces\ServicesInterfaces;


interface FireEventServiceInterface {
    public function sharePullmanLocation($long , $lat , $travelId ) : void;
}