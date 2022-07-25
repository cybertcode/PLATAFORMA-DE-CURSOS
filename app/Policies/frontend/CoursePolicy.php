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
    // Para proteger los curso que no están activos | agregamos ? para que nos deja ver el curso sin estar loqueado
    public function published(?User $user, Course $course)
    {
        if ($course->status == 3) {
            return true;
        } else {
            return false;
        }
    }
}