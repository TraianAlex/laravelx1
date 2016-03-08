<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // view()->composer('partials.navigation', function($view){
        //     $view->with('latest', Article::latest()->first());
        // }); moved in a custom class
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       if ($this->app->environment() == 'local') {
            $this->app->register('Laracasts\Generators\GeneratorsServiceProvider');
        }
    }
}
