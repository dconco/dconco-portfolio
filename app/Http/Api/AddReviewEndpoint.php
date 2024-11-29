<?php

namespace App\Http\Api;

use PhpSlides\Http\Request;
use PhpSlides\Http\ApiController;

final class AddReviewEndpoint extends ApiController
{
   public function store (Request $req)
   {
      return $req->body();
   }
}