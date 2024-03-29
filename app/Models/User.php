<?php

namespace App\Models;

use App\Models\admin\Course;
use App\Models\admin\Review;
use App\Models\admin\Comment;
use App\Models\admin\Profile;
use App\Models\admin\Reaction;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
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
    // Para que muestre el slug en url
    public function getRouteKeyName()
    {
        return 'slug';
    }

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
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function reactions()
    {
        return $this->hasMany(Reaction::class);
    }
    /****************************
     * Relación muchos a muchos *
     ****************************/
    public function courses_enrolled()
    {
        return $this->belongsToMany(Course::class);
    }
    public function lessons()
    {
        return $this->belongsToMany(Lesson::class);
    }
}