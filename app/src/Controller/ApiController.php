<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use App\Service\RandomNumber\RandomNumberService;

class ApiController {

    /**
     * @var RandomNumberService
     */
    private $randomNumberService;

    /**
     * @param RandomNumberService $randomNumberService
     */
    public function __construct(
      RandomNumberService $randomNumberService
    ) {
        $this->randomNumberService = $randomNumberService;
    }

    public function randomNumber()
	{
		return new JsonResponse([
			'success' => true,
			'number' => $this->randomNumberService->getRandomNumber(),
		]);
	}

}
