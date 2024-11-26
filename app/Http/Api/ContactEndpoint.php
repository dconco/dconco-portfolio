<?php

namespace App\Http\Api;

use PhpSlides\view;
use PhpSlides\Http\Request;
use PhpSlides\Http\ApiController;
use App\Http\Controller\SendMailController;

final class ContactEndpoint extends ApiController
{
	public function store(Request $req)
	{
		$f_name = $req->body('firstname');
		$l_name = $req->body('lastname');
		$email = $req->body('email');
		$message = $req->body('message');

		$fullname = $f_name . ' ' . $l_name;

		$res = SendMailController::send(
			$email,
			'Contact Form Submission',
			view::render('::Mail::MailResponse', $fullname),
		);

		if ($res !== true) {
			return $res;
		}

		$res = SendMailController::send(
			'concodave@gmail.com',
			"New message from $fullname via dconco.dev",
			view::render('::Mail::ContactMail', $fullname, $email, $message),
		);

		if ($res !== true) {
			return $res;
		}
		return 'success';
	}

	public function error(Request $req)
	{
		http_response_code(405);
	}
}
