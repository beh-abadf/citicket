<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'user_name', 'film_id', 'body', 'password', 'date_created', 'day_created', 'time_created', 'date_updated', 'day_updated', 'time_updated'
    ];
    protected $hidden = [];


    public function film(): BelongsTo
    {
        return $this->belongsTo(Film::class, 'film_id');
    }
}
