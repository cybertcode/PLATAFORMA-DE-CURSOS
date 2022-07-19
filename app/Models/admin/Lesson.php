<?php

namespace App\Models\admin;

use App\Models\User;
use App\Models\admin\Section;
use App\Models\admin\Platform;
use App\Models\admin\Description;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lesson extends Model
{
    use HasFactory;
    /**********************
     * Relación uno a uno *
     **********************/
    public function description()
    {
        return $this->hasOne(Description::class);
    }
    /*********************************
     * Relación uno a muchos inversa *
     *********************************/
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }
    /****************************
     * Relación muchos a muchos *
     ****************************/
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}