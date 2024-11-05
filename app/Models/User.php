<?php

namespace App\Models;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Trip;
use App\Models\Message;
use App\Models\Booking;


class User extends Authenticatable
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
        return $this->hasMany(Trip::class);
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class);
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
        'google_id',
        'role',
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
