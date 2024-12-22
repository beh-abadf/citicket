<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    use HasFactory;
    protected $table = 'cities';
    protected $fillable = [
        'city_name',
        'date_created',
        'day_created',
        'time_created',
        'date_updated',
        'day_updated',
        'time_updated'
    ];
    protected $hidden = ['province_id'];

    public function cinema()
    {
        return $this->hasMany(Cinema::class, 'city_id');
    }
    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }
}
