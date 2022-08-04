<?php

namespace App\Policies\frontend;

use App\Models\admin\Course;
use App\Models\admin\Review;
use App\Models\User;
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
    // Para validar que el curso le pertenezca el usuario autentificado para editar -actualizar
    public function dicatated(User $user, Course $course)
    {
        if ($course->user_id == $user->id) {
            return true;
        } else {
            return false;
        }
    }
    // Para validar que únicamente cuando el curso sea en estado 2 o solicitado por el mismo usuario
    public function revision(User $user, Course $course)
    {
        if ($course->status == 2) {
            return true;
        } else {
            return false;
        }
    }
    public function valued(User $user, Course $course)
    {
        if (Review::where('user_id', $user->id)->where('course_id', $course->id)->count()) {
            return false;
        } else {
            return true;
        }
    }
}