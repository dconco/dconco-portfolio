<?php

namespace App\Http\Api;

use PhpSlides\Http\Request;
use PhpSlides\Http\ApiController;

final class ContactEndpoint extends ApiController
{
   public function store (Request $req)
   {
      return $req->body();
   }

   public function error (Request $req)
   {
      http_response_code(403);
   }
}