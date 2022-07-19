<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
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