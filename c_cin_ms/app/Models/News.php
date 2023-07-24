<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    public $table = "news";
    protected $fillable = [
        'news_images', 'news', 'date_created',
        'day_created', 'time_created',
        'date_updated', 'day_updated',
        'time_updated',
    ];
}
