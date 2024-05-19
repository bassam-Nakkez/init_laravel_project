<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\BusinessLogic\Interfaces\ServicesInterfaces\SqlServicesInterface;

class SqlServices implements SqlServicesInterface {



    // transactions functions ---------
    public function startTransaction(){
        DB::beginTransaction();
    }

    public function commitTransaction(){
        DB::commit();
    }

    public function rollbackTransaction(){
        DB::rollbackTransaction();
    }



}










