<?php

namespace App\Service\RandomNumber\Adapter\Api;

class ApiResponseTransformer
{

    /**
     * @param array $responseData
     * @return int
     * @throws \Exception
     */
    public function transform(array $responseData): int
    {
        if (array_key_exists('number', $responseData)) {
            return $responseData['number'];
        }

        throw new \Exception('Unable to unserialize the API response');
    }

}
