<?php

namespace App\Service\RandomNumber\Adapter\Api;

use App\Service\RandomNumber\Adapter\RandomNumberAdapter;

class ApiAdapter implements RandomNumberAdapter
{

    private $responseTransformer;


    private $apiBaseUrl;

    public function __construct(
        ApiResponseTransformer $responseTransformer,
        string $apiBaseUrl
    ) {
        $this->responseTransformer = $responseTransformer;
        $this->apiBaseUrl = $apiBaseUrl;
    }

    public function getRandomNumber(): int
    {
        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, $this->apiBaseUrl . '/api-mock.php');
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($handle);
        $data = json_decode($data, true);
        curl_close($handle);

        return $this->responseTransformer->transform($data);
    }
}
