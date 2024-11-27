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
			return 'Database connection refused';
		}
		MailList::static();

		$mail = MailList::Search(
			'SELECT * FROM mail_list WHERE email=%s',
			$email,
		);

		$mail = $mail ?? new MailList();

		$mail->email = $email;
		$mail->fullname = $fullname;
		$mail->Save();

		return 'success';
	}
}
