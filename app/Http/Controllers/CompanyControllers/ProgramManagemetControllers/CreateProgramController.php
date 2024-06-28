<?php
namespace App\Http\Controllers\CompanyControllers\ProgramManagemetControllers;



use App\Services\Services;
use Illuminate\Http\Request;
use App\Repository\BaseRepository;
use App\Http\Controllers\Controller;
use App\Adapters\presenters\JsonResponsePresenter;
use App\BusinessLogic\UseCases\CompanyActor\ProgramManagement\CreateProgramUseCase\CreateProgramInput;
use App\BusinessLogic\UseCases\CompanyActor\ProgramManagement\CreateProgramUseCase\CreateProgramLogic;

class CreateProgramController extends Controller
{

    public function __invoke(Request $request)
    {
       // $travel = [ 
        // "features" :[3,2,1],
        // "pullmanIdDescriptionId":1,
        // "note" :"يرجى التقيد بالتعليمات",
        // "isVIP" : false,
        // "travelDate":null,
        // "timeToLeave":"22:45",
        // "price":850000,
        // "DailySerialNumber" :17567999655,
        // "seriesId":1
        // ]
 
        // $data = [
        //     'start' => '4-6-2024' ,
        //     'End' => '4-7-2024',
        //     'from'=> 5 ,
        //     'to'=> 3 ,
        //     'companyId'=> 7 ,
        //     'Tuesday'=> [$travel,$travel],
        //     'Wednesday'=> [],
        //     'Thursday'=> [$travel,$travel],
        //     'Friday'=> [$travel ,$travel,$travel],
        //     // Saturday  Sunday  Monday
            
        // ];
  
        // $days = (new Services)->DateServices()->getDaysBetween('4-7-2024','15-7-2024');
        
        // return response()->json($days);

        return $this->applyAspect(

            //--------------------Functional Service ------------------------------------
    
            new CreateProgramLogic(new CreateProgramInput($request->validated()),
            new BaseRepository ,
            new JsonResponsePresenter,
            new Services),
    
        //------------------Non Functional Registered--------------------------------
            [
                /*array of non fanctional services*/
            ]
    
    
    )->sendResult();
        
        
        
    }

    
}
