<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Trip;

class City extends Model
{

    use HasFactory;
    protected $fillable = [
            'name',
            'latitude',
            'longitude',
    ];
    public function index()
{
    // Fetch all cities
    $cities = City::all();
    
    // Fetch trips if needed or pass an empty array initially
    $trips = Trip::all();

    return view('index', compact('cities', 'trips'));
}

    public function trips(){
        return $this->hasMany(Trip::class, 'origin_city_id');
    }
    public function destinations()
    {
        return $this->hasMany(Trip::class, 'destination_city_id');
    }
}
