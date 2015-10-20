<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class ComposerServiceProvider extends ServiceProvider
{
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
        View::composer('widgets.post_bottom_scripts', 'App\Http\ViewComposers\PostBottomScriptsComposer');
    }

    /**
     * Register.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
