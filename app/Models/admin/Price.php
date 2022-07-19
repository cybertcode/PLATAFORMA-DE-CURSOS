<?php

namespace App\Models\admin;

use App\Models\admin\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Price extends Model
{
    use HasFactory;
    /*************************
     * Relación uno a muchos *
     *************************/
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}