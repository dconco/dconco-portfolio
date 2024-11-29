<?php

namespace App\Http\Api;

use PhpSlides\Http\Request;
use PhpSlides\Http\ApiController;

final class AddReviewEndpoint extends ApiController
{
   public function store (Request $req)
   {
      extract($req->post());

      if (!$fullname || !$profile_url || !$message || !$req->files('avatar'))
      {
         return 'Invalid request body!';
      }

      return $req->post();
   }
}