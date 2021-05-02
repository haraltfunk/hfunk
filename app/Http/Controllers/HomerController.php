<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class HomerController extends Controller
{
    public function __invoke()
    {

        //Llama 12 unidades de la coleccion de cursos "pubicados" Desc
        $courses = Course::where('status', '3')->latest('id')->get()->take(12);

        return view('welcome', compact('courses'));
    }
}
