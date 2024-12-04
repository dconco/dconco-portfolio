<?php

namespace App\Http\Api\Admin;

use PhpSlides\Http\ApiController;
use Forgery\DconcoPortfolio\Reviews\Reviews;

final class ListReviewEndpoint extends ApiController
{
	public function list()
	{
		$all = [];
		$reviews = (new Reviews())->SearchMany('SELECT * FROM reviews ORDER BY status pending');

		foreach ($reviews as $value)
		{
			$all[] = $value->_orm_row_orig;
		}

		return json_encode(['message' => $all]);
	}

	public function 
}
