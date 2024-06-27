<?php

namespace App\Services;
use App\Events\SharePullmanLocation;
use App\BusinessLogic\Interfaces\ServicesInterfaces\FireEventServiceInterface;

class FireEventService implements FireEventServiceInterface {

    public function sharePullmanLocation($long , $lat , $travelId ) : void {
        broadcast(new SharePullmanLocation($long , $lat , $travelId))->toOthers();

    }


    

}










