<?php

namespace App\Tests\Service;

use App\Service\RandomNumber\RandomNumberService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class RandomNumberServiceTest extends KernelTestCase {

    public function testRandomNumber()
    {
        self::bootKernel();
        $randomNumberService = self::$container->get(RandomNumberService::class);

        $this->assertIsInt($randomNumberService->getRandomNumber());
    }

    public function testNumbersNotSame()
    {
        self::bootKernel();
        $randomNumberService = self::$container->get(RandomNumberService::class);

        $firstNumber = $randomNumberService->getRandomNumber();
        $secondNumber = $randomNumberService->getRandomNumber();

        $this->assertNotEquals($firstNumber, $secondNumber);
    }

}
