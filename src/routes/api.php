<?php

use PhpSlides\Http\Api;
use App\Http\Api\ContactEndpoint;
use App\Http\Api\AddReviewEndpoint;
use App\Http\Api\Admin\ListReviewEndpoint;

Api::v1()->route(url: '/contact', controller: ContactEndpoint::class);
Api::v1()->route(url: '/reviews/add', controller: AddReviewEndpoint::class);

$admin_review = Api::v1()
	->define('/admin/reviews', ListReviewEndpoint::class)
	->withGuard('admin');

$admin_review->withGuard()->map([
	'/list' => ['POST|GET', '@list'],
	'/approve/{review_id}' => [GET, '@approve'],
]);
