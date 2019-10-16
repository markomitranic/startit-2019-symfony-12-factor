<?php

namespace App\Service\RandomNumber\Adapter\Api;

use App\Service\RandomNumber\Adapter\RandomNumberAdapter;

class ApiAdapter implements RandomNumberAdapter
{

    private $responseTransformer;

    public function __construct(ApiResponseTransformer $responseTransformer)
    {
        $this->responseTransformer = $responseTransformer;
    }

    public function getRandomNumber(): int
    {
        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, 'http://127.0.0.1:8000/api-mock.php');
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($handle);
        $data = json_decode($data, true);
        curl_close($handle);

        return $this->responseTransformer->transform($data);
    }
}
