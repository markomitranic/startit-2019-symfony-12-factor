<?php

namespace App\Service\RandomNumber\Adapter\Api;

use App\Service\RandomNumber\Adapter\RandomNumberAdapter;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;

class ApiAdapter implements RandomNumberAdapter
{

    private $responseTransformer;

    private $logger;

    private $apiBaseUrl;

    public function __construct(
        ApiResponseTransformer $responseTransformer,
        LoggerInterface $logger,
        string $apiBaseUrl
    ) {
        $this->responseTransformer = $responseTransformer;
        $this->logger = $logger;
        $this->apiBaseUrl = $apiBaseUrl;
    }

    public function getRandomNumber(): int
    {
        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, $this->apiBaseUrl . '/api-mock.php');
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($handle);
        $data = json_decode($data, true);

        if (curl_errno($handle)) {
            $this->logger->critical('Couldn\'t send request: ' . curl_error($handle));
            throw new \Exception(
                'Couldn\'t send request: ' . curl_error($handle),
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        } else if (($resultStatus = curl_getinfo($handle, CURLINFO_HTTP_CODE)) !== 200) {
            $this->logger->critical('Request failed: HTTP status code: ' . $resultStatus);
            throw new \Exception(
                'Request failed: HTTP status code: ' . $resultStatus,
                $resultStatus
            );
        }
        curl_close($handle);

        return $this->responseTransformer->transform($data);
    }
}
