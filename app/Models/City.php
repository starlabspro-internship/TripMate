<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Trip;
use App\Models\User;

class City extends Model
{

    use HasFactory;
    protected $fillable = [
            'name',
            'latitude',
            'longitude',
    ];

    public function trips(){
        return $this->hasMany(Trip::class, 'origin_city_id');
    }
    public function destinations()
    {
        return $this->hasMany(Trip::class, 'destination_city_id');
    }
    public function users()
    {
        return $this->hasMany(User::class, 'city', 'name');
    }
}
