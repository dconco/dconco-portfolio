<?php

namespace App\Http\Api;

use PhpSlides\Http\Request;
use PhpSlides\Http\ApiController;

final class AddReviewEndpoint extends ApiController
{
   public function store (Request $req)
   {
      extract($req->post());
      http_response_code(400);

      if (!$fullname || !$profile_url || !$message || !$req->files('avatar'))
      {
         return 'Invalid request body!';
      }
      if (!filter_var($profile_url, FILTER_VALIDATE_URL))
      {
         return 'Enter a valid URL';
      }

      http_response_code(200);

      $avatar = $req->files('avatar');
      $name = $avatar->name;

      return filetype($avatar);
   }
}