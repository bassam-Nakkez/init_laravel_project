<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\BusinessLogic\Interfaces\EntityInterfaces\BaseEntity;

class Post extends Model implements BaseEntity
{
    use HasFactory;


    protected $table = 'posts';

    protected $primaryKey = 'postId';

    protected $fillable = [
        "companyId",
        "content",
        "image",
        "likes"
    ];

            /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        "companyId"
    ];

    /**
     * Get all of the companies for the Follow
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class, 'companyId', 'companyId');
    }

}
