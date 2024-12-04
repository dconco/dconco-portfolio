<?php

namespace App\Http\Api\Admin;

use PhpSlides\Http\Request;
use PhpSlides\Http\ApiController;
use Forgery\DconcoPortfolio\Reviews\Reviews;

final class ListReviewEndpoint extends ApiController
{
	public function list(Request $req)
	{
		return (new Reviews())->SearchMany();
	}
}
