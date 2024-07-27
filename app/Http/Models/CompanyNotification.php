<?php
namespace App\Http\Models;

use App\Http\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\BusinessLogic\Interfaces\EntityInterfaces\CompanyNotificationEntity;

class CompanyNotification extends Model implements CompanyNotificationEntity
{
    use HasFactory;

    
    protected $table = 'company_notifications';

    protected $primaryKey = 'notificationId';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'companyId',
        'message',
        'details',
        'is_read',
        "avatar",
      //  "time",
      
    ];




        /**
     * Get the user that owns the Notification
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }


}
    
    