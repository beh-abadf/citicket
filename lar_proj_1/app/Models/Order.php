<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'who_ordered_id', 'who_ordered_name',
        'film_id', 'time_of_film','order_name',
        'date_created', 'day_created',
        'time_created', 'date_updated',
        'day_updated', 'time_updated'
    ];

    protected function member():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
