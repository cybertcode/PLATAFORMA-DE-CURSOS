<?php

namespace App\Models\admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;
    /******************************
     * Relación uno a uno inversa *
     ******************************/
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}