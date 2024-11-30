<?php

namespace App\Http\Api;

use PhpSlides\Http\Request;
use PhpSlides\Http\ApiController;
use Forgery\DconcoPortfolio\Reviews\Reviews;

final class AddReviewEndpoint extends ApiController
{
	public function store(Request $req)
	{
		$fullname = $profile_url = $message = $avatar = null;

		extract($req->post());
		http_response_code(400);
		$avatar = $req->files('avatar');

		/**
		 * Validate the request body
		 */
		if (!$fullname || !$profile_url || !$message || !$avatar) {
			return $req->files();
		}
		if (!filter_var($profile_url, FILTER_VALIDATE_URL)) {
			return 'Enter a valid URL';
		}
		$char_len = strlen($message);

		if (strlen($message) > 255) {
			return "Review must be between 1 and 255 characters! But it is $char_len";
		}

		$this->validate_image($avatar);

		// Create the uploads directory if it does not exists
		$reviews_dir = getenv('__DIR__') . 'src/resources/uploads/reviews';
		$new_file = time() . $avatar->name;

		if (!is_dir($reviews_dir)) {
			mkdir(directory: $reviews_dir, recursive: true);
		}
		/*
		// Upload the image
		if (!move_uploaded_file($avatar->tmp_name, "$reviews_dir/$new_file")) {
			http_response_code(500);
			return 'Error while uploading avatar';
		}

		/**
		 * Add the information to the database
		 *
		Reviews::check_connection();
		$reviews = new Reviews();

		$reviews->fullname = $fullname;
		$reviews->profile_url = $profile_url;
		$reviews->message = $message;
		$reviews->avatar = $new_file;

		$reviews->Save();*/

		http_response_code(200);
		return 'success';
	}

	protected function validate_image($avatar)
	{
		$imgType = getimagesize($avatar->tmp_name);

		if (!$imgType) {
			exit('Invalid image type');
		}

		if ($avatar->size > 1000000) {
			exit('Image size should be less than 1mb');
		}
	}
}
