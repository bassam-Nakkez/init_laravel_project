<?php
namespace App\BusinessLogic\Interfaces\ServicesInterfaces;


interface FireEventServiceInterface {


    public function sharePullmanLocation($long , $lat , $travelId ) : void;



    public function publicEvent($channel , $event , $data ) : void;


}

