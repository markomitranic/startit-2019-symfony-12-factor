<?php

namespace App\Tests\Service;

use App\Service\RandomNumberService;
use PHPUnit\Framework\TestCase;

class RandomNumberServiceTest extends TestCase {

	public function testRandomNumber()
	{
		$randomNumberService = new RandomNumberService();

//        $this->assertIsInt('');
		$this->assertIsInt($randomNumberService->getRandomNumber());
	}

	public function testNumbersNotSame()
    {
        $randomNumberService = new RandomNumberService();

        $firstNumber = $randomNumberService->getRandomNumber();
        $secondNumber = $randomNumberService->getRandomNumber();

        $this->assertNotEquals($firstNumber, $secondNumber);
    }

}
