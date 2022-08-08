<?php

namespace App\Models\admin;


use App\Models\User;
use App\Models\admin\Reaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
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
    public function commentable()
    {
        return $this->morphTo();
    }
    /*************************************
     * Relación uno a muchos polimórfica *
     *************************************/
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
    public function reactions()
    {
        return $this->morphMany(Reaction::class, 'reactionable');
    }
    /*********************************
     * Relación uno a muchos inversa *
     *********************************/
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}