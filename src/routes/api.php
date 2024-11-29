<?php

use PhpSlides\Http\Api;
use App\Http\Api\ContactEndpoint;
use App\Http\Api\AddReviewEndpoint;

Api::v1()->route(url: '/contact', controller: ContactEndpoint::class);
Api::v1()->route(url: '/review/add', controller: AddReviewEndpoint::class);