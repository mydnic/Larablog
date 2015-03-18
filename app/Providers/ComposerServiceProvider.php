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
        View::composer('layout.bootstrap3.main', 'App\Http\ViewComposers\HeaderComposer');
        View::composer('post.show', 'App\Http\ViewComposers\PostComposer');
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