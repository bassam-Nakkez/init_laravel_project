<?php
namespace App\BusinessLogic\Core\Options;

enum EntityType : String {

    case User       = "user";
    case Company    = "company";
    case Employee   = "employee";
    case Admin      = "admin";
    case Station    = "station";
    case Travel     = "travel";
    case City       = "city";
    case Feature    = "feature";
    case PullmanDescription = "pullmanDescription";
    case TravelStation ='travelStation';
    case TravelFeature = 'travelFeature';
    case Series = 'series';
    case Follow = 'follow';
    case Recommand = 'recommand';
    case Post = 'post';
    case Reservation = 'reservation';
    case Subscribe = 'subscribe';
    case Auth = 'auth';
    case Passenger = 'passenger';
    case User_Notification = 'user-notification';
    case EmployeeTravel = 'employeeTravel';
    case program = 'program';
}


