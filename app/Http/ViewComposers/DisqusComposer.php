<?php

namespace App\Http\ViewComposers;

use App\Setting;
use Illuminate\Contracts\View\View;

class DisqusComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $settings;

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
        $view->with('setting', $this->settings);
    }
}
