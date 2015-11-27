<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Article;//

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeNavigation();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    /**
     * Compose the navigation bar.
     */
    private function composeNavigation()
    {
        view()->composer('partials.navigation', 'App\Http\Composers\NavigationComposer');//compose or change manualy @handle
        // view()->composer('partials.navigation', function($view){
        //     $view->with('latest', Article::latest()->first());
        // });
    }
}
