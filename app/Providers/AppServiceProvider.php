<?php

namespace App\Providers;

use App\Billing\Stripe;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{

    // protected $defer = true;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);

        view()->composer('layouts.sidebar', function ($view) {
            $view->with('archives', \App\Post::archives());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // \App::singleton('App\Billing\Stripe', function () {
        // $this->app->singleton('App\Billing\Stripe', function () {
        $this->app->singleton(Stripe::class, function () {
        // $this->app->singleton(Stripe::class, function ($app) {
            // $app->make('');
            return new Stripe(config('services.stripe.secret'));
        });
    }
}
