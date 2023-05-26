<?php

namespace App\Providers;

use App\Services\NewsApiService;
use Illuminate\Support\ServiceProvider;

class NewsApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(NewsApiService::class, function ($app) {
            // Retrieve API credentials from the configuration
            $apiKey = config('news_api.api_key');
            $baseUrl = config('news_api.base_url');

            return new NewsApiService($apiKey, $baseUrl);
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