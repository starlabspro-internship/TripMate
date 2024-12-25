<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SosAlert extends Model
{
    protected $fillable = [
        'user_id',
        'trip_id',
        'location',
        'latitude',
        'longitude',
        'status',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function trips()
    {
        return $this->belongsTo(Trip::class, 'trip_id');
    }
}