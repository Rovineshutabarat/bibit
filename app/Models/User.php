<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $table = "user";
    protected $fillable = [
        'google_id',
        'username',
        'email',
        'password',
        'image',
        'address',
        'contact'
    ];


    protected $hidden = [
        'password',
    ];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
