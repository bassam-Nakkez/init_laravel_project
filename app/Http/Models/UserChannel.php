<?php
namespace App\Http\Models;

use App\Http\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\BusinessLogic\Interfaces\EntityInterfaces\UserChannel as EntityInterfacesUserChannel;

class UserChannel extends Model implements EntityInterfacesUserChannel
{
    use HasFactory;

    protected $table = 'user_channels';

    protected $primaryKey = 'channelId';


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'userId',
        'name',
        'event',
    ];




        /**
     * Get the user that owns the Notification
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
    
    