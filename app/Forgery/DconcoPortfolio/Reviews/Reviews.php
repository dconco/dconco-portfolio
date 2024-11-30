<?php

namespace Forgery\DconcoPortfolio\Reviews;

use PhpSlides\Database\Database;

class Reviews extends Database
{
	static function check_connection(): void
	{
		if (static::$_connect_error) {
			http_response_code(500);
			echo 'Database connection refused';
			exit();
		}
	}
}
