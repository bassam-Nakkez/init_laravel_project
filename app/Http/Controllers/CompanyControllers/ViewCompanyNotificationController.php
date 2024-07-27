<?php
namespace App\Http\Controllers\CompanyControllers;

use App\Services\Services;
use Illuminate\Http\Request;
use App\Repository\BaseRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Adapters\presenters\JsonResponsePresenter;

use App\BusinessLogic\UseCases\CompanyActor\ViewCompanyNotificationUseCase\ViewCompanyNotificationInput;
use App\BusinessLogic\UseCases\CompanyActor\ViewCompanyNotificationUseCase\ViewCompanyNotificationLogic;

class ViewCompanyNotificationController extends Controller
{
    public function __invoke( Request  $request )
    {

        $company = Auth::guard('others')->user();
        $input = $request->all();
        $input['companyId'] = $company->companyId;
        
        return $this->applyAspect(

        //--------------------Functional Service ------------------------------------

        new ViewCompanyNotificationLogic(new ViewCompanyNotificationInput($input) ,
        new BaseRepository,
        new JsonResponsePresenter,
        new Services),

    //------------------Non Functional Registered--------------------------------
        [
            /*array of non functional services*/
        ]
    )->sendResult();
  }
}
