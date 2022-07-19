<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
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