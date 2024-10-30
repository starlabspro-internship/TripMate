<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\City;

class Trip extends Model
{
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
        return $this->hasMany(Booking::class);
    }

    public function messages(){
        return $this->hasMany(Message::class);
    }
}
