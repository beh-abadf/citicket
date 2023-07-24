<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class City extends Model
{
    use HasFactory;
    protected $table = 'cities';
    protected $fillable = [
        'city_name', 'date_created', 'day_created', 'time_created', 'date_updated', 'day_updated', 'time_updated'
    ];
    protected $hidden = ['city_of_id'];

    protected function _place()
    {
        return $this->hasOne(Place::class, 'place_of_id');
    }
    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'city_of_id');
    }
}
