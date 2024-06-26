<?php
namespace App\Factories;

use App\Http\Models\City;
use App\Http\Models\Post;
use App\Http\Models\Role;
use App\Http\Models\User;
use App\Http\Models\Admin;
use App\Http\Models\Follow;
use App\Http\Models\Series;
use App\Http\Models\Travel;
use App\Http\Models\Company;
use App\Http\Models\Feature;
use App\Http\Models\Program;
use App\Http\Models\Station;
use App\Http\Models\Employee;
use App\Http\Models\Passenger;
use App\Http\Models\Recommand;
use App\Http\Models\Subscribe;
use App\Http\Models\Reservation;
use App\Http\Models\TravelStation;
use App\Http\Models\TravelFeatures;
use App\Http\Models\EmployeeTravail;
use App\Http\Models\UserNotification;
use App\Http\Models\PullmanDescription;
use App\BusinessLogic\Core\Options\EntityType;
use App\BusinessLogic\Interfaces\EntityInterfaces\BaseEntity;

class FactoryModel
{

    public function make(EntityType $type, $data) :BaseEntity
    {
        // Add a New Modle to Factory here..
        //-------------------------------------

        $model =
        [
            'user'                  =>(new User( $data)),
            'admin'                 =>(new Admin( $data)),
            'employee'              =>(new Employee($data)),
            'company'               =>(new Company( $data)),
            'station'               =>(new Station($data)),
            'travel'                =>(new Travel($data)),
            'city'                  =>(new City($data)),
            'feature'               =>(new Feature($data)),
            'pullmanDescription'    =>(new PullmanDescription($data)),
            'travelStation'         =>(new TravelStation($data)),
            'travelFeature'         =>(new TravelFeatures($data)),
            'series'                =>(new Series($data)),
            'follow'                =>(new Follow($data)),
            'recommand'             =>(new Recommand($data)),
            'post'                  =>(new Post($data)),
            'reservation'           =>(new Reservation($data)),
            'subscribe'             =>(new Subscribe($data)),
            'auth'                  =>(new Role($data)),
            'employeeTravel'        =>(new EmployeeTravail($data)),
            'passenger'             =>(new Passenger($data)),
            'user-notification'     =>(new UserNotification($data)),
            'program'               =>(new Program($data)),
        ];

        return $model[$type->value];
    }
}
