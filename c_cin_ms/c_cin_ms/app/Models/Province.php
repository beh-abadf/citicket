<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Province extends Model
{
    use HasFactory;

    protected $fillable = [
        'province_name', 'date_created',
        'date_created', 'day_created',
        'time_created', 'date_updated',
        'day_updated', 'time_updated'
    ];

    protected function city():HasOne
    {
        return $this->hasOne(Place::class, 'place_of_id');
    }
}
