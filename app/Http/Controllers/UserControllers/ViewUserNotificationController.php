<?php
namespace App\Http\Controllers\UserControllers;

use App\Services\Services;
use Illuminate\Http\Request;
use App\Repository\BaseRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Adapters\presenters\JsonResponsePresenter;
use App\BusinessLogic\UseCases\UserActor\ViewUserNotificationUseCase\ViewUserNotificationInput;
use App\BusinessLogic\UseCases\UserActor\ViewUserNotificationUseCase\ViewUserNotificationLogic;

class ViewUserNotificationController extends Controller
{
    public function __invoke( Request  $request )
    {

        $user = Auth::guard('user')->user();
        $input = $request->all();
        $input['userId'] = $user->userId;
        
        return $this->applyAspect(

        //--------------------Functional Service ------------------------------------

        new ViewUserNotificationLogic(new ViewUserNotificationInput($input) ,
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
