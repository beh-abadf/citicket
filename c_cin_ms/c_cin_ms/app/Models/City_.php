<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City_ extends Model
{
    use HasFactory;
    public  $timestamps = false;
    protected $table='cities';
    public function place()
    {
        return $this->hasOne(Place::class, 'place_of_id');
    }
}
