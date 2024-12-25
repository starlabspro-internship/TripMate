<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Trip;
use App\Models\Message;
use App\Models\Booking;
use Illuminate\Support\Str;
use App\Models\PassengerRating;


class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    public function trips()
    {
        return $this->hasMany(Trip::class, 'driver_id');
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'passenger_id' );
    }
    public function mesazhat()
    {
        return $this->hasMany(Message::class);
    }

public function receivedRatings()
{
    return $this->hasMany(PassengerRating::class, 'reviewed_id');
}

public function givenRatings()
{
    return $this->hasMany(PassengerRating::class, 'reviewer_id');
}

public function updateAverageRating()
{
    $average = $this->receivedRatings()->avg('rating'); 
    $this->average_rating = round($average, 1);        
    $this->save();                                      
}

    public function alerts()
    {
        return $this->hasMany(SosAlert::class);
    }
    
    public function isSuperAdmin()
    {
        return $this->is_super_admin == 1;
    }
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    protected $fillable = [
        'image',
        'name',
        'lastname',
        'email',
        'password',
        'phone',
        'birthday',
        'city',
        'gender',
        'address',
        'google_id',
        'recaptcha_verified',
        'email_verification_code',
        'email_verified_at',
        'verification_code',
        'id_document',
        'background_status',
        'background_document',
        'verification_status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'birthday' => 'date',
        ];
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->uuid) {
                $model->uuid = (string) Str::uuid();
            }
        });
    }
}
