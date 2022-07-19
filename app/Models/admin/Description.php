<?php

namespace App\Models\admin;

use App\Models\admin\Lesson;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Description extends Model
{
    use HasFactory;
    /******************************
     * Relación uno a uno inversa *
     ******************************/
    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}