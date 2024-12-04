<?php

namespace App\Guards;

use PhpSlides\Http\Auth\AuthGuard;

final class AdminGuard extends AuthGuard
{
	public function authorize (): bool
	{
		$auth = self::$request->auth()->basic;

		if (isset($auth['username']) && isset($auth['password']))
		{
			$admin_username = getenv('ADMIN_USERNAME');
			$admin_password = getenv('ADMIN_PASSWORD');

			if ($auth['username'] === $admin_username && password_verify($auth['password'], $admin_password))
			{
				return true;
			}
		}

		http_response_code(401);
		echo 'Unauthorized';
		return false;
	}
}