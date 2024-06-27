<?php
namespace App\Http\Controllers\EmployeeControllers\DriverControllers;

use App\Services\Services;

use Illuminate\Http\Request;
use App\Repository\BaseRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Adapters\presenters\JsonResponsePresenter;
use App\BusinessLogic\UseCases\DriverActor\SharePullmanLocation\SharePullmanLocationInput;
use App\BusinessLogic\UseCases\DriverActor\SharePullmanLocation\SharePullmanLocationLogic;

class SharePullmanLocationController extends Controller
{
       public function __invoke( Request  $request )
        {

            // $employee = Auth::guard('other')->user()->employee;
            $input = $request->all();
            // //$input ['emp_type'] = $employee->type;
            // $input['driverId'] = $employee->employeeId;

            $input['driverId'] = 1;
            return $this->applyAspect(
    
            //--------------------Functional Service ------------------------------------
    
            new SharePullmanLocationLogic(new SharePullmanLocationInput($input) ,
            new BaseRepository ,
            new JsonResponsePresenter,
            new Services),
    
        //------------------Non Functional Registered--------------------------------
            [
                /*array of non functional services*/
            ]
        )->sendResult();
    
    }
}
