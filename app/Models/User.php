<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // function to get all users 
    static function get_all_users() {
        return User::orderBy('created_at', 'desc')->get();
    }

    // function to get user achieved tasks for current day 

    /**
     * Get all of the complete for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function complete() {
        return $this->hasMany(Complete::class)->whereDay('created_at', Carbon::today())->orderBy('created_at', 'desc');
    }

}
