<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Place extends Model
{
    use HasFactory;
    protected $fillable = [
        'place_name', 'address',
        'google_map_iframe', 'capacity',
        'place_image_name',
        'date_created', 'day_created',
        'time_created', 'date_updated',
        'day_updated', 'time_updated'
        ,'place_of_id','city_of_id'
    ];
    protected $hidden = ['place_of_id','city_of_id'];
    protected function _province():BelongsTo
    {
        return $this->belongsTo(Province::class, 'city_of_id');
    }
    protected function _city():BelongsTo
    {
        return $this->belongsTo(City::class, 'place_of_id');
    }
}
