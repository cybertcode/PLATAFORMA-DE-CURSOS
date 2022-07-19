<?php

namespace App\Models\admin;

use App\Models\admin\Lesson;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Platform extends Model
{
    use HasFactory;
    /*************************
     * Relación uno a muchos *
     *************************/
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}