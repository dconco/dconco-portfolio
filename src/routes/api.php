<?php

use PhpSlides\Http\Api;
use App\Http\Api\ContactEndpoint;

Api::v1()->route('/contact', ContactEndpoint::class);