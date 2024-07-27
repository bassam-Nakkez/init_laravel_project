<?php

namespace App\Services;
use App\Events\PublicEvent;
use App\Events\SharePullmanLocation;
use App\BusinessLogic\Interfaces\ServicesInterfaces\FireEventServiceInterface;

class FireEventService implements FireEventServiceInterface {

    public function sharePullmanLocation($long , $lat , $travelId ) : void {
        broadcast(new SharePullmanLocation($long , $lat , $travelId))->toOthers();

    }


    public function publicEvent($channel , $event , $data ) : void {
        broadcast(new PublicEvent($channel , $event , $data))->toOthers();

    }


    

}










