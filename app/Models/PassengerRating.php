<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Trip;

class PassengerRating extends Model
{
    use HasFactory;

    protected $fillable = [
        'trip_id',
        'reviewer_id',
        'reviewed_id',
        'rating',
        'feedback',
    ];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewer_id');
    }

    public function reviewed()
    {
        return $this->belongsTo(User::class, 'reviewed_id');
    }
    protected static function booted()
{
    static::created(function ($rating) {
        $reviewedUser = $rating->reviewed;
        $reviewedUser->updateAverageRating();
    });
}

}

