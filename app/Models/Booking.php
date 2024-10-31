<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Trip;

class Booking extends Model
{
   public function passenger()
   {
    return $this->belongsTo(User::class, 'passenger_id');
   }
   public function trip()
   {
    return $this->belongsTo(Trip::class,'trip_id');
   }
}
