<?php

namespace App\Observers\frontend;

use App\Models\admin\Section;
use Illuminate\Support\Facades\Storage;

class SectionObserver
{
    public function deleting(Section $section)
    {
        // Recorremos las seccion que tenga relacion con leccion
        foreach ($section->lessons as $lesson) {
            //Preguntamos si la leccion tiene asoaciado un recurso
            if ($lesson->resource) {
                Storage::delete($lesson->resource->url); //eliminamos la imagen
                $lesson->resource->delete(); //Eliminamos el registro de la BD
            }
        }
    }
}