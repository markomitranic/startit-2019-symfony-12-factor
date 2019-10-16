<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use App\Service\RandomNumberService;

class ApiController {

	public function randomNumber()
	{
        $randomNumberService = new RandomNumberService();

		return new JsonResponse([
			'success' => true,
			'number' => $randomNumberService->getRandomNumber(),
		]);
	}

}
