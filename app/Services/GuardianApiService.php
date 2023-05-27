<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class GuardianApiService
{
    protected $apiKey;
    protected $baseUrl;
    protected $httpClient;

    public function __construct($apiKey, $baseUrl)
    {
        $this->apiKey = $apiKey;
        $this->baseUrl = $baseUrl;
        $this->httpClient = new Client([
            'base_uri' => $this->baseUrl,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Accept' => 'application/json',
            ],
        ]);
    }

    public function getData()
    {
        try {
            $response = $this->httpClient->get('/api/data');
            $data = json_decode($response->getBody(), true);

            return $data;
        } catch (GuzzleException $e) {
            // Handle API request exception
            // Log or throw an appropriate exception
        }
    }

    // Add more methods for interacting with the API as needed
}