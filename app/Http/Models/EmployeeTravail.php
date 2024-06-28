<?php

namespace App\Http\Models;

use Exception;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\BusinessLogic\Interfaces\EntityInterfaces\BaseEntity;

class EmployeeTravail extends Authenticatable implements BaseEntity
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'employee_travails';

    protected $primaryKey = 'employeeTravelId';

    protected $fillable = [
        "employeeId",
        "travelId"
    ];


    /**
     * Get the user associated with the EmployeeTravail
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function travel()
    {
        return $this->hasOne(Travel::class, 'travelId', 'travelId');
    }

}
