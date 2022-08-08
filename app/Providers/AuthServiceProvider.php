<?php

namespace App\Providers;

use App\Models\admin\Course;
use Illuminate\Support\Facades\Gate;
use App\Policies\frontend\CoursePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    // Aquí registramos el policy si en caso lo creas diferentes a las convenciones de laravel o creaste dentro de un subdirectorio
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Course::class => CoursePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        // Gate::define('enrolled', Course::class);

        //
    }
}