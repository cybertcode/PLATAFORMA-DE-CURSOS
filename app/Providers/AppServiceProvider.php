<?php

namespace App\Providers;

use App\Models\admin\Lesson;
use App\Models\admin\Section;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\Observers\frontend\LessonObserver;
use App\Observers\frontend\SectionObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */

    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Registramos el observer que creamos para lesson
        Lesson::observe(LessonObserver::class);
        // Registramos el observer que creamos para section
        Section::observe(SectionObserver::class);
        //creamos nuestras propias directivas para activar las rutas activas
        // routeIs => nombre de la directiva en $expression se guardar lo que pasamos por la directiva
        Blade::directive('routeIs', function ($expression) {
            return "<?php if(Request::url() == route($expression)): ?>";
});
}
}