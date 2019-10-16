<?php

namespace App\Service\RandomNumber;

use App\Service\RandomNumber\Adapter\Api\ApiAdapter;
use App\Service\RandomNumber\Adapter\CryptoAdapter;
use App\Service\RandomNumber\Adapter\PseudoAdapter;
use Throwable;

class RandomNumberService {

    private $pseudo;

    private $crypto;

    private $api;

    public function __construct(
        PseudoAdapter $pseudoAdapter,
        CryptoAdapter $cryptoAdapter,
        ApiAdapter $apiAdapter
    ) {
        $this->pseudo = $pseudoAdapter;
        $this->crypto = $cryptoAdapter;
        $this->api = $apiAdapter;
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
            try {
                return $this->crypto->getRandomNumber();
            } catch (Throwable $e) {
                return $this->pseudo->getRandomNumber();
            }
        }
    }

}
