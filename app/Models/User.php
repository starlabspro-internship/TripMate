<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Trip;
use App\Models\Message;
use App\Models\Booking;


class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     public function redirectTo()
    {
        if($this->hasVerifiedEmail()){
        return route('profile.verification'); // Redirect to the profile verification page
    }
        return '/end-code';
}
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

    public function isSuperAdmin()
    {
        return $this->is_super_admin == 1;
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
        'address',
        'google_id',
        'recaptcha_verified',
        'email_verification_code',
        'email_verified_at',
        'verification_code',
        'id_document',
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
        ];
    }
}
