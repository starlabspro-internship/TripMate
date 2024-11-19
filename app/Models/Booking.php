<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Trip;

class Booking extends Model
{

   protected $fillable = [
      'trip_id',
      'passenger_id',
      'seats_booked',
      'status',
      'total_price',
      'session_id',
  ];
  
   public function passenger()
   {
    return $this->belongsTo(User::class, 'passenger_id');
   }
   public function trip()
   {
    return $this->belongsTo(Trip::class,'trip_id');
   }
}
