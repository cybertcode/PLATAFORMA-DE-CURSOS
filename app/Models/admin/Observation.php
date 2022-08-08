<?php

namespace App\Models\admin;

use App\Models\admin\Course;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['body', 'course_id'];
    /************************************
     * Relación de uno a muchos inversa *
     ************************************/
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

}