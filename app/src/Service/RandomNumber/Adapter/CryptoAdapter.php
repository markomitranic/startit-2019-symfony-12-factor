<?php

namespace App\Service\RandomNumber\Adapter;

class CryptoAdapter implements RandomNumberAdapter
{

    public function getRandomNumber(): int
    {
        return random_int(0, 100);
    }
}
