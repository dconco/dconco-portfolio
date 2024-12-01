<?php

namespace App\Guards;

use PhpSlides\Web\JWT;
use PhpSlides\Http\Auth\AuthGuard;

final class AdminGuard extends AuthGuard
{
	public function authorize(): bool
	{
		$auth = self::$request->auth()->basic;

		if (isset($auth['username']) && $auth['username'] === 'd') {
			return true;
		}

		http_response_code(401);
		echo 'Unauthorized';
		return false;
	}
}
