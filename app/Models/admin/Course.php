<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    /*******************************
     * Constantes para los estados *
     *******************************/
    const BORRADOR = 1;
    const REVISION = 2;
    const PUBLICADO = 3;
}