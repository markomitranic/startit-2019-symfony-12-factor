<?php

namespace App\Service\RandomNumber;

use App\Service\RandomNumber\Adapter\Api\ApiAdapter;
use App\Service\RandomNumber\Adapter\CryptoAdapter;
use App\Service\RandomNumber\Adapter\PseudoAdapter;
use Psr\Log\LoggerInterface;
use Throwable;

class RandomNumberService {

    private $pseudo;

    private $crypto;

    private $api;

    private $logger;

    public function __construct(
        PseudoAdapter $pseudoAdapter,
        CryptoAdapter $cryptoAdapter,
        ApiAdapter $apiAdapter,
        LoggerInterface $logger
    ) {
        $this->pseudo = $pseudoAdapter;
        $this->crypto = $cryptoAdapter;
        $this->api = $apiAdapter;
        $this->logger = $logger;
    }

    /**
     * @return int
     * @throws \Exception
     */
    public function getRandomNumber(): int
	{
        try {
            return $this->api->getRandomNumber();
        } catch (Throwable $e) {
            $this->logger->warning('Unable to contact the secure API. Falling back to simpler methods.');

            try {
                return $this->crypto->getRandomNumber();
            } catch (Throwable $e) {
                return $this->pseudo->getRandomNumber();
            }
        }
    }

}
