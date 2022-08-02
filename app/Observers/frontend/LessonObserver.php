<?php

namespace App\Observers\frontend;

use App\Models\admin\Lesson;
use Illuminate\Support\Facades\Storage;

class LessonObserver
{
    // Para crear
    /*************************************************************************************
     * IMPORTANTE >= FUNCIONAN SOLO CUANDO SE REALIZA UNA ACCION USANDO EL MODELO LESSON *
     *************************************************************************************/
    public function creating(Lesson $lesson)
    {
        $url = $lesson->url;
        $platform_id = $lesson->platform_id;
        if ($platform_id == 1) {
            $patron = '%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v-) ) ([\w-]{10,12}) $%x';
            $array = preg_match($patron, $url, $parte);
            $lesson->iframe = '<iframe width="560" height="315" src="http://www.youtube.com/embed' . $parte[1] . '"frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        } else {
            $patron = '/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/';
            $array = preg_match($patron, $url, $parte);
            $lesson->iframe = '<iframe src="https://player.vimeo.com/video/' . $parte[2] . '"width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>';
        }

    }
    // Para actualizar
    public function updating(Lesson $lesson)
    {
        $url = $lesson->url;
        $platform_id = $lesson->platform_id;
        if ($platform_id == 1) {
            $patron = '%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v-) ) ([\w-]{10,12}) $%x';
            $array = preg_match($patron, $url, $parte);
            $lesson->iframe = '<iframe width="560" height="315" src="http://www.youtube.com/embed' . $parte[1] . '"frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        } else {
            $patron = '/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/';
            $array = preg_match($patron, $url, $parte);
            $lesson->iframe = '<iframe src="https://player.vimeo.com/video/' . $parte[2] . '"width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>';
        }

    }
    public function deleting(Lesson $lesson)
    {
        if ($lesson->resource) {
            Storage::delete($lesson->resource->url); //eliminamos la imagen si tiene
            $lesson->resource->delete(); //elimimanos el registro de la BD tabla Resource
        }
    }
}