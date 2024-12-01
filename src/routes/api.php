<?php

use PhpSlides\Http\Api;
use App\Http\Api\ContactEndpoint;
use App\Http\Api\AddReviewEndpoint;
use App\Http\Api\Admin\ListReviewEndpoint;

Api::v1()->route(url: '/contact', controller: ContactEndpoint::class);
Api::v1()->route(url: '/review/add', controller: AddReviewEndpoint::class);

$admin_review = Api::v1()->define('/admin/review', ListReviewEndpoint::class);

$admin_review->map([
	'/list' => [POST, '@list'],
]);
