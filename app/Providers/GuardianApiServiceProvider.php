<?php

namespace App\Providers;

use App\Services\GuardianApiService;
use Illuminate\Support\ServiceProvider;

class GuardianApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(GuardianApiService::class, function ($app) {
            // Retrieve API credentials from the configuration
            $apiKey = config('guardian_api.api_key');
            $baseUrl = config('guardian_api.base_url');

            return new GuardianApiService($apiKey, $baseUrl);
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