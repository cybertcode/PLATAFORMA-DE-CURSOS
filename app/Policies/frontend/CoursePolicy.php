<?php

namespace App\Policies\frontend;

use App\Models\User;
use App\Models\admin\Course;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function enrolled(User $user, Course $course)
    {
        // return true;
        // Veficamos que el estudiante está matriculado el curso pasado de la vista
        return $course->students->contains($user->id);
    }
}