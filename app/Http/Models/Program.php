<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\BusinessLogic\Interfaces\EntityInterfaces\ProgramEntity;

class Program extends Model implements ProgramEntity
{
    use HasFactory;

    
    protected $table = 'programs';

    protected $primaryKey = 'programId';

    protected $fillable = [
        "from",
        "to",
        "companyId",
        'start',
        'end',
    ];

    protected $hidden = [
    ];

}
