<?php
namespace App\Http\Controllers\CompanyControllers\ReservationManagementControllers;


use Illuminate\Http\Request;
use App\Repository\BaseRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Adapters\presenters\JsonResponsePresenter;
use App\BusinessLogic\UseCases\CompanyActor\GetTravelMatrixUseCase\GetTravelMatrixWebInput;
use App\BusinessLogic\UseCases\CompanyActor\GetTravelMatrixUseCase\GetTravelMatrixWebLogic;

class GetTravelMatrixWebController extends Controller
{
    public function __invoke( Request $request){

        $company = Auth::guard('other')->user()->company;
        $input = $request->all();
        $input['companyId'] = $company->companyId;
        
        return $this->applyAspect(

            //--------------------Functional Service ------------------------------------

            new GetTravelMatrixWebLogic(
            new GetTravelMatrixWebInput($input),
            new BaseRepository ,
            new JsonResponsePresenter,
            ),

        //------------------Non Functional Registered--------------------------------
            [
                /*array of non functional services*/
            ]


        )->sendResult();
    }
}
