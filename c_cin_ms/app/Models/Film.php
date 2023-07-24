<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Film extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'film_name', 'running_time',
        'director_name', 'ex_producer', 'day',
        'time', 'more_about',
        'country', 'language',
        'price_of_film', 'film_iframe',
        'image_name', 'salon',
        'film_of_ids', 'date_created',
        'day_created', 'time_created',
        'date_updated', 'day_updated',
        'time_updated'
    ];
    //protected $hidden= ['who_created', 'who_updated'];
    public function comments():HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
