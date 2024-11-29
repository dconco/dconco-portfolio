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
      $avatar = $req->files('avatar');

      if (!$fullname || !$profile_url || !$message || !$avatar)
      {
         return 'Invalid request body!';
      }
      if (!filter_var($profile_url, FILTER_VALIDATE_URL))
      {
         return 'Enter a valid URL';
      }

      $this->validate_image($avatar);

      $reviews_dir = getenv('__DIR__') . '/src/resources/uploads/reviews';
      $new_file = $reviews_dir . '/' . time() . $avatar->name;

      if (!is_dir($reviews_dir))
      {
         mkdir(directory: $reviews_dir, recursive: true);
      }

      if (!move_uploaded_file($avatar->tmp_name, $new_file))
      {
         return 'Error while uploading avatar';
      }

      http_response_code(200);
      return 'success';
   }

   protected function validate_image ($avatar)
   {
      $imgType = getimagesize($avatar->tmp_name);

      if (!$imgType)
      {
         exit('Invalid image type');
      }

      if ($avatar->size > 1000000)
      {
         exit('Image size should be less than 1mb');
      }
   }
}