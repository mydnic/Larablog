<?php

namespace App\Http\ViewComposers;

use App\Setting;
use Illuminate\Contracts\View\View;

class GoogleAnalyticsComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $code;

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
        $this->code = Setting::first()->google_analytics_code;
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
        $view->with('code', $this->code);
    }
}
