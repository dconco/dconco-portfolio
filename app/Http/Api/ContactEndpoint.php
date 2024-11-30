<?php

namespace App\Http\Api;

use PhpSlides\view;
use PhpSlides\Http\Request;
use PhpSlides\Http\ApiController;
use App\Http\Controller\SendMailController;
use Forgery\DconcoPortfolio\MailList\MailList;

final class ContactEndpoint extends ApiController
{
	public function store(Request $req)
	{
		extract($req->body());
		http_response_code(400);

		if (!$firstname || !$lastname || !$email || !$message) {
			return 'Invalid request body!';
		}
		if (!filter_var($email, filter: FILTER_VALIDATE_EMAIL)) {
			return 'Enter a valid email address';
		}

		$fullname = "$firstname $lastname";

		$res = SendMailController::send(
			to: $email,
			subject: 'Contact Form Submission',
			body: view::render('::Mail::MailResponse', $fullname),
		);

		if ($res !== true) {
			return $res;
		}

		$res = SendMailController::send(
			to: getenv('SMTP_FROM'),
			subject: "New message from $fullname via dconco.dev",
			body: view::render('::Mail::ContactMail', $fullname, $email, $message),
		);

		if ($res !== true) {
			return $res;
		}

		return $this->register($fullname, $email);
	}

	/**
	 * Handle error request
	 */
	public function error(Request $req)
	{
		http_response_code(405);
	}

	/**
	 * Register a new email information ℹ️
	 */
	private function register($fullname, $email)
	{
		if (MailList::$_connect_error) {
			http_response_code(500);
			return 'Database connection refused';
		}
		MailList::static();

		$mail = MailList::Search(
			'SELECT * FROM mail_list WHERE email=%s',
			$email,
		);

		$mail ??= new MailList();

		$mail->email = $email;
		$mail->fullname = $fullname;
		$mail->Save();

		http_response_code(200);
		return 'success';
	}
}
