<?php
namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\BusinessLogic\Interfaces\EntityInterfaces\SeriesEntity;


class Series extends Model implements SeriesEntity
{
    use HasFactory;

    protected $table = 'series';

    protected $primaryKey = 'seriesId';

    protected $fillable = [
        "companyId",
        "seriesName",
    ];

        /**
     * Get all of the travels for the station
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stations()
    {
        return $this->hasMany(Station::class, 'seriesId', 'seriesId');
    }



}
