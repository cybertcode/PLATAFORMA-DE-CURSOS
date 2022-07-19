<?php

namespace App\Models\admin;

use App\Models\admin\Lesson;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasFactory;
    /*************************
     * Relación uno a muchos *
     *************************/
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
    /*********************************
     * Relación uno a muchos inversa *
     *********************************/
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}