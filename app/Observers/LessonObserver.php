<?php

namespace App\Observers;

use App\Models\Lesson;
use Illuminate\Support\Facades\Storage;


class LessonObserver
{
    //metodo que se activa solo cuando tratemos de crear un registro de la tabla lesson
    public function creating(Lesson $lesson){
        $url = $lesson->url;
        $platform_id = $lesson->platform_id;

        if($platform_id == 1){
            $patron = '%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x';
            $array = preg_match($patron, $url, $parte);
            $lesson->iframe = '<iframe width="560" height="315" src="https://www.youtube.com/embed/'. $parte[1] .'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        }else{
            $patron = '/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/';
            $array = preg_match($patron, $url, $parte);
            $lesson->iframe = '<iframe src="https://player.vimeo.com/video/' . $parte[2] . '" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>';
        }
    }

    //metodo que se activa solo cuando tratemos de actualizar un registro de la tabla lesson
    public function updating(Lesson $lesson){
        $url = $lesson->url;
        $platform_id = $lesson->platform_id;

        if($platform_id == 1){
            $patron = '%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x';
            $array = preg_match($patron, $url, $parte);
            $lesson->iframe = '<iframe width="560" height="315" src="https://www.youtube.com/embed/'. $parte[1] .'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        }else{
            $patron = '/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/';
            $array = preg_match($patron, $url, $parte);
            $lesson->iframe = '<iframe src="https://player.vimeo.com/video/' . $parte[2] . '" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>';
        }
    }
    //metodo que se activa solo cuando tratemos de eliminar un registro de la tabla lesson
    public function deleting(Lesson $lesson){
        if ($lesson->resource) {
            //primero borra el archivo de la carpeta resources
            Storage::delete($lesson->resource->url);

            //luego elimina el registro de la base de datos
            $lesson->resource->delete();
        }
    }
}
