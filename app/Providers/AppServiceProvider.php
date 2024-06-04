<?php

namespace App\Providers;

use Illuminate\Auth\AuthServiceProvider;
use Illuminate\Broadcasting\BroadcastServiceProvider;
use Illuminate\Events\EventServiceProvider;
use Illuminate\Foundation\Support\Providers\RouteSserviceProvider;
use Illuminate\Support\ServiceProvider;

class AppAuthServiceProvider extends AuthServiceProvider{}
class AppBroadcastServiceProvider extends BroadcastServiceProvider{}
class AppEventServiceProvider extends EventServiceProvider{}
class AppRouteServiceProvider extends RouteServiceProvider{}

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
