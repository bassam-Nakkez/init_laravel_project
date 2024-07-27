<?php
namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\BusinessLogic\Interfaces\EntityInterfaces\CompanyChannel as EntityInterfacesCompanyChannel;

class CompanyChannel extends Model implements EntityInterfacesCompanyChannel
{
    use HasFactory;


        protected $table = 'company_channels';

        protected $primaryKey = 'channelId';
    
    
        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            'companyId',
            'name',
           
          
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
