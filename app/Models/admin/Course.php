<?php

namespace App\Models\admin;

use App\Models\User;
use App\Models\admin\Goal;
use App\Models\admin\Image;
use App\Models\admin\Level;
use App\Models\admin\Price;
use App\Models\admin\Lesson;
use App\Models\admin\Review;
use App\Models\admin\Section;
use App\Models\admin\Audience;
use App\Models\admin\Category;
use App\Models\admin\Requirement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'status'];
    // Para contar los estudiantes por curso | dentro del array el nombre del método de relación muchos a muchos
    protected $withCount = ['students', 'reviews'];
    // Agregamos un atributo a éste modelo
    //se agrega un método-nombre del atributo mayúscula inicio-atributo mayúscula inicio
    public function getRatingAttribute()
    {
        if ($this->reviews_count) {
            // Nos retorna todos los reviews que dejó los alumnos de los cursos
            //retornamos la relación-campo que contiene la calificación
            return round($this->reviews->avg('rating'), 1);
        } else {
            return 5;
        }
    }
    // Quey Scopes para la consulta si trae dato o es vació - CATEGORÍA
    public function scopeCategory($query, $category_id)
    {
        // Si trae un valor entra al if caso contrario nó
        if ($category_id) {
            return $query->where('category_id', $category_id);
        }
    }
    // Quey Scopes para la consulta si trae dato o es vació -NIVEL
    public function scopeLevel($query, $level_id)
    {
        // Si trae un valor entra al if caso contrario nó
        if ($level_id) {
            return $query->where('level_id', $level_id);
        }
    }
    // Para slug en url
    public function getRouteKeyName()
    {
        return "slug";
    }
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
    public function requirements()
    {
        return $this->hasMany(Requirement::class);
    }
    public function goals()
    {
        return $this->hasMany(Goal::class);
    }
    public function audiences()
    {
        return $this->hasMany(Audience::class);
    }
    public function sections()
    {
        return $this->hasMany(Section::class);
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
    /**********************************
     * Relación uno a uno polimórfica *
     **********************************/
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    /***************************
     * Relacion hasManyThrough *
     ***************************/
    public function lessons()
    {
        return $this->hasManyThrough(Lesson::class, Section::class);
    }
}