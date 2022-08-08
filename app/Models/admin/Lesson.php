<?php

namespace App\Models\admin;

use App\Models\User;
use App\Models\admin\Comment;
use App\Models\admin\Section;
use App\Models\admin\Platform;
use App\Models\admin\Reaction;
use App\Models\admin\Resource;
use App\Models\admin\Description;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lesson extends Model
{
    use HasFactory;
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
    // Para curso completado
    public function getCompletedAttribute()
    {
        return $this->users->contains(auth()->user()->id);
    }
    /**********************
     * Relación uno a uno *
     **********************/
    public function description()
    {
        return $this->hasOne(Description::class);
    }
    /*********************************
     * Relación uno a muchos inversa *
     *********************************/
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }
    /****************************
     * Relación muchos a muchos *
     ****************************/
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    /***********************************
     * Relación uno a uno porlimórfica *
     ***********************************/
    public function resource()
    {
        return $this->morphOne(Resource::class, 'resourceable');
    }
    /**************************************
     * Relación uno a muchos porlimórfica *
     **************************************/
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
    public function reactions()
    {
        return $this->morphMany(Reaction::class, 'reactionable');
    }
}