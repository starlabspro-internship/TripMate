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
        'driver_comments',
        'passenger_gender_preference',
        'latitude',
        'longitude',
        'status',
        'start_time',
        'end_time',
    ];
    protected $casts = [
        'departure_time' => 'datetime',
        'arrival_time' => 'datetime',
        'start_time' => 'datetime',
        'end_time' => 'datetime',
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

    public function alerts()
    {
        return $this->hasMany(SosAlert::class);
    }

    public function mesazhat(){
        return $this->hasMany(Message::class);
    }

    public function start()
    {
        $this->status = 'In Progress';
        $this->start_time = now();
        $this->save();
    }

    public function end()
    {
        $this->status = 'Completed';
        $this->end_time = now();
        $this->save();
    }
    public function passengers()
    {
        return $this->hasManyThrough(
            User::class,
            Booking::class,
            'trip_id',
            'id',
            'id',
            'passenger_id'
        );
    }

}
