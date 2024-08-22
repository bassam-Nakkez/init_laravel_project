<?php
namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\BusinessLogic\Interfaces\EntityInterfaces\TravelFollowEntity;

class TravelFollow extends Model implements TravelFollowEntity
{
    use HasFactory;

    
    protected $table = 'travel_follows';

    protected $primaryKey = 'travelFollowId';

    protected $fillable = [
        "travelId",
        "userId",
    ];




}