<?php

namespace App\Service\RandomNumber\Adapter;

interface RandomNumberAdapter
{

    /**
     * @return int
     * @throws \Exception
     */
    public function getRandomNumber(): int;

}
