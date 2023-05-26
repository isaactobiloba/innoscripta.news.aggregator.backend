<?php

namespace App\Providers;

use App\Services\NewYorkTimesApiService;
use Illuminate\Support\ServiceProvider;

class NewYorkTimesApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(NewYorkTimesApiService::class, function ($app) {
            // Retrieve API credentials from the configuration
            $apiKey = config('new_york_times_api.api_key');
            $baseUrl = config('new_york_times_api.base_url');

            return new NewYorkTimesApiService($apiKey, $baseUrl);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}