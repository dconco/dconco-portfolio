<?php

namespace App\Http\Api\Admin;

use PhpSlides\Http\Request;
use PhpSlides\Http\ApiController;
use Forgery\DconcoPortfolio\Reviews\Reviews;

final class ListReviewEndpoint extends ApiController
{
	public function list(Request $req)
	{
		$all = [];
		$reviews = (new Reviews())->SearchMany();

		foreach ($reviews as $value)
		{
			$all[] = $value->_orm_row_orig;
		}

		return json_encode($all);
	}
}
