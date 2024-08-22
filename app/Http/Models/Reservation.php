<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\BusinessLogic\Interfaces\EntityInterfaces\BaseEntity;

class Reservation extends Model implements BaseEntity
{
    use HasFactory;



    protected $table = 'reservations';

    protected $primaryKey = 'reservationId';

    protected $fillable = [
        "travelId",
        "userId",
        "companyId",
        "station",
        "seteIndex",
        "gendor"
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        "travelId",
        "userId"
    ];

    /**
     * Get the travel associated with the Reservation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function travel()
    {
        return $this->hasOne(Travel::class, 'travelId', 'travelId');
    }

    /**
     * Get the user associated with the Reservation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'userId', 'userId');
    }
}
