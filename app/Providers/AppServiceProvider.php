<?php

namespace App\Providers;

use App\Auth\KeycloakWebUserProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
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
        // บังคับ Base URL ให้มี /contact เสมอ
        URL::forceRootUrl(config('app.url'));

        Auth::provider('keycloak-users', function ($app, array $config) {
            return new KeycloakWebUserProvider($config['model'] ?? null);
        });
    }
}
