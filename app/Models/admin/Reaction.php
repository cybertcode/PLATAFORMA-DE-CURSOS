<?php

namespace App\Models\admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reaction extends Model
{
    use HasFactory;
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
    const LIKE    = 1;
    const DISLIKE = 2;
    /*********************************
     * Relación de tipo porlimórfica *
     *********************************/
    public function reactionable()
    {
        return $this->morphTo();
    }
    /*********************************
     * Relación uno a muchos inversa *
     *********************************/
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}