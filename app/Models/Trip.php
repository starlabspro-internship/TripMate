<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\City;
use App\Models\Booking;

class Trip extends Model
{
    protected $fillable = [
        'driver_id',
        'origin_city_id',
        'destination_city_id',
        'departure_time',
        'arrival_time',
        'available_seats',
        'price',
        'latitude',
        'longitude',
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'driver_id');
    }

    public function origincity(){
        return $this->belongsTo(City::class, 'origin_city_id');
    }
    public function destinationcity(){
        return $this->belongsTo(City::class, 'destination_city_id');
    }

    public function bookings(){
        return $this->hasMany(Booking::class );
    }

    public function mesazhat(){
        return $this->hasMany(Message::class);
    }
}
