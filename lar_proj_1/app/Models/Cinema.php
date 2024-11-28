<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cinema extends Model
{
    use HasFactory;
    protected $fillable = [
        'cinema_name', 'address',
        'google_map_iframe', 'capacity',
        'cinema_image_name',
        'date_created', 'day_created',
        'time_created', 'date_updated',
        'day_updated', 'time_updated'
        ,'city_id','province_id'
    ];
    protected $hidden = ['city_id','province_id'];
    protected function province():BelongsTo
    {
        return $this->belongsTo(Province::class, 'province_id');
    }
    protected function city():BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id');
    }
}
