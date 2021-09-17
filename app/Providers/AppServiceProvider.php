<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        // Aqui podemos generar nuestra propia directiva de Blade, como @if, @foreach, etc C41 -14:46
        Blade::directive('routeIs', function ($expression) {
            return "<?php  if(Request::url() == route($expression)): ?>";
        });
    }
}
