<?php

namespace App\Http\Controller;

use PhpSlides\Http\Request;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

final class SendMailController
{
	public static function send($to, $subject, $body, $altBody = ''): string|bool
	{
		$mail = new PHPMailer(true); # Passing `true` enables exceptions
		try {
			# Server settings
			$mail->isSMTP(); # Set mailer to use SMTP
			$mail->Host = getenv('SMTP_HOST'); # Specify main and backup SMTP servers
			$mail->SMTPAuth = true; # Enable SMTP authentication
			$mail->Username = getenv('SMTP_USERNAME'); # SMTP username
			$mail->Password = getenv('SMTP_PASSWORD'); # SMTP password
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; # Enable TLS encryption, `ssl` also accepted
			$mail->Port = getenv('SMTP_PORT'); # TCP port to connect to
			$mail->SMTPDebug = 0; # Disable verbose debug output
			# Recipients
			$mail->addAddress($to);
			$mail->setFrom(getenv('SMTP_FROM'), getenv('SMTP_FROM_NAME'));

			# $mail->addReplyTo(getenv('SMTP_FROM'), getenv('SMTP_FROM_NAME'));
			# if you want it to send copy of the mail back to the sender
			# $mail->addCustomHeader('Return-Path: ' . getenv('SMTP_FROM'));
			# $mail->addBCC(getenv('SMTP_FROM'));

			$mail->addEmbeddedImage(
				dirname(dirname(dirname(__DIR__))) .
					'/src/resources/assets/logo.png',
				'icon',
			);

			# Content
			$mail->isHTML(true); # Set mail format to HTML
			$mail->CharSet = 'UTF-8';
			$mail->Subject = $subject;
			$mail->Body = $body;
			$mail->AltBody = $altBody;

			$mail->SMTPOptions = [
				'ssl' => [
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => false,
				],
			];

			if ($mail->send()) {
				return true;
			} else {
				return 'Email message could not be sent.';
			}
		} catch (Exception $e) {
			return $mail->ErrorInfo;
		}
	}
}
