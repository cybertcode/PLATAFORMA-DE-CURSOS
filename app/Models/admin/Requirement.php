<?php

namespace App\Models\admin;

use App\Models\admin\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Requirement extends Model
{
    use HasFactory;
    /*********************************
     * Relación uno a muchos inversa *
     *********************************/
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}