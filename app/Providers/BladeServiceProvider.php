<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use View;

/**
 * Class BladeServiceProvider.
 */
class BladeServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;
    public $sessionIdentifier = 'display_type';

    /**
     * Register any misc. blade extensions.
     */
    public function register()
    {
        /*
         * The block of code inside this directive indicates
         * the chosen language requests RTL support.
         */
        Blade::if('langrtl', fn () => (session()->has($this->sessionIdentifier) && session($this->sessionIdentifier) == "rtl")
            || (!session()->has($this->sessionIdentifier) && config('app.display_type') == 'rtl'));
    }

    public function boot()
    {
        View::composer('*', function ($view) {
            $view->with('assetsPath', (session()->has($this->sessionIdentifier) && session($this->sessionIdentifier) == "rtl")
                || (!session()->has($this->sessionIdentifier) && config('app.display_type') == 'rtl') ? 'assets-rtl' : 'assets');
        });
    }
}
