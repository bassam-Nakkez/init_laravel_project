<?php
namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\BusinessLogic\Interfaces\EntityInterfaces\PassengerEntity;

class Passenger extends Model implements PassengerEntity
{
    use HasFactory;

    protected $table      = 'passengers';
    protected $primaryKey = 'passengerId';
        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstName',
        'lastName',
        'phoneNumber',
        'gender',
        'birthDay',
        'personalId',
        'travelId',
        'station',
        'seatsNumbers',
        'birthDay',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [

    ];

 
}
