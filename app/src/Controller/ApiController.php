<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;

class ApiController {

	public function randomNumber()
	{
		$number = random_int(0, 100);
		return new JsonResponse([
			'success' => true,
			'number' => $number
		]);
	}

}