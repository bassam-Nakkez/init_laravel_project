<?php
namespace App\Http\Models;

use App\BusinessLogic\Interfaces\EntityInterfaces\SeriesEntity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Series extends Model implements SeriesEntity
{
    use HasFactory;

    protected $table = 'series';

    protected $primaryKey = 'seriesId';

    protected $fillable = [
        "companyId",
        "seriesName",
    ];


}
