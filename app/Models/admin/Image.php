<?php

namespace App\Models\admin;

use App\Models\admin\Lesson;
use App\Models\admin\Section;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
    /*********************************
     * Relación de tipo porlimórfica *
     *********************************/
    public function imageable()
    {
        return $this->morphTo();
    }
}