<?php
namespace App\Http\Controllers\CompanyControllers\SeriesManagement;


use App\Services\Services;
use Illuminate\Http\Request;
use App\Repository\BaseRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Adapters\presenters\JsonResponsePresenter;
use App\BusinessLogic\UseCases\CompanyActor\SeriesManagement\ViewSeriesUseCase\ViewSeriesInput;
use App\BusinessLogic\UseCases\CompanyActor\SeriesManagement\ViewSeriesUseCase\ViewSeriesLogic;

class ViewSeriesController extends Controller{
    


    public function __invoke( Request  $request )
    {

        $company = Auth::guard('other')->user()->company;
        $input = $request->all();
        $input['companyId'] = $company->companyId;
        
        return $this->applyAspect(

        //--------------------Functional Service ------------------------------------

        new ViewSeriesLogic(new ViewSeriesInput($input) ,
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
