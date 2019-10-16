<?php

namespace App\Service;

class RandomNumberService {

	public function getRandomNumber(): int
	{
		return random_int(0, 100);
	}

}