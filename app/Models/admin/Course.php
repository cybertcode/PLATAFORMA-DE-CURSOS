<?php

namespace App\Models\admin;

use App\Models\User;
use App\Models\admin\Level;
use App\Models\admin\Price;
use App\Models\admin\Review;
use App\Models\admin\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    /*******************************
     * Constantes para los estados *
     *******************************/
    const BORRADOR = 1;
    const REVISION = 2;
    const PUBLICADO = 3;
    /*************************
     * Relación uno a muchos *
     *************************/
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    /*********************************
     * Relación uno a muchos inversa *
     *********************************/
    public function teacher()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function price()
    {
        return $this->belongsTo(Price::class);
    }

    /****************************
     * Relación muchos a muchos *
     ****************************/
    public function students()
    {
        return $this->belongsToMany(User::class);
    }
}