<?php

namespace App\Policies;

use App\Models\Course;
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

    //Revisa si el usuario está o no matriculado en un curso
    public function enrolled(User $user, Course $course){
        return $course->students->contains($user->id);
    }

    //Revisa si el curso esta publicado
    public function published(?User $user, Course $course){
        if ($course->status == 3) {
            return true;
        } else {
            return false;
        }
        
    }
}
