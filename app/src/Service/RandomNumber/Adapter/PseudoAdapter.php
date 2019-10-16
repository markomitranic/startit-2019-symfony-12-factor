<?php

namespace App\Service\RandomNumber\Adapter;

class PseudoAdapter implements RandomNumberAdapter
{

    public function getRandomNumber(): int
    {
        return rand(0, 100);
    }
}
