<?php

namespace App\Models;

use App\Models\admin\Course;
use App\Models\admin\Review;
use App\Models\admin\Profile;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
    /**********************
     * Relación uno a uno *
     **********************/
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
    /*************************
     * Relación uno a muchos *
     *************************/
    public function courses_dictated()
    {
        return $this->hasMany(Course::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    /****************************
     * Relación muchos a muchos *
     ****************************/
    public function courses_enrolled()
    {
        return $this->belongsToMany(Course::class);
    }
}