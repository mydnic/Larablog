<?php namespace App\Providers;

use View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider {

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layout.blog.main', 'App\Http\ViewComposers\HeaderComposer');
        View::composer('layout.blog.menu', 'App\Http\ViewComposers\NavigationComposer');
        View::composer('widgets.disqus', 'App\Http\ViewComposers\DisqusComposer');
        View::composer('widgets.google_analytics', 'App\Http\ViewComposers\GoogleAnalyticsComposer');
    }

    /**
     * Register
     *
     * @return void
     */
    public function register()
    {
        //
    }

}