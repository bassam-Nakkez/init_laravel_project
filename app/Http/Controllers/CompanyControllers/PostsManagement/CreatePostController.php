<?php

namespace App\Http\Controllers\CompanyControllers\PostsManagement;

use App\Services\Services;
use Illuminate\Http\Request;
use App\Repository\BaseRepository;
use App\Http\Controllers\Controller;
use App\Adapters\presenters\JsonResponsePresenter;
use App\BusinessLogic\UseCases\CompanyActor\PostManagement\CreatePostUseCase\CreatePostInput;
use App\BusinessLogic\UseCases\CompanyActor\PostManagement\CreatePostUseCase\CreatePostLogic;

class CreatePostController extends Controller
{
          
    public function __invoke( Request  $request )
    {


        return $this->applyAspect(

        //--------------------Functional Service ------------------------------------

        new CreatePostLogic(new CreatePostInput($request->all()) ,
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
