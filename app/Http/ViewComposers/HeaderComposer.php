<?php

namespace App\Http\ViewComposers;

use App\Setting;
use App\SocialLink;
use Illuminate\Contracts\View\View;

class HeaderComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $settings;
    protected $links;

    /**
     * Create a new profile composer.
     *
     * @param UserRepository $users
     *
     * @return void
     */
    public function __construct()
    {
        // Dependencies automatically resolved by service container...
        $this->settings = Setting::first();
        $this->links = SocialLink::all();

        $this->settings->description_baseline = str_replace('"', '', $this->settings->app_baseline);
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     *
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('setting', $this->settings)->with('links', $this->links);
    }
}
