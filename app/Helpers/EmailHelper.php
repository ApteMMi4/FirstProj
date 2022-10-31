<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

if(!function_exists('sendEmailNotify'))
{
  /*
  *
  * Функция создания тамбнейла
  *
  */
  function sendEmailNotify($to_email, $subject, $from_name, $title, $text, $mail_type, $verify_link)
  {
    $mail_title     = $title;
    $mail_content   = $text;
    $website_link   = route('index');
    $faq_link       = route('index') . '/faq';
    $agree_link     = route('index') . '/agreement';

    $html = View::make('frontend.mails.base', [
      'mail_title'   => $mail_title,
      'mail_content' => $mail_content,
      'website_link' => $website_link,
      'faq_link'     => $faq_link,
      'agree_link'   => $agree_link,
      'verify_link'  => $verify_link,
      'mail_type'    => $mail_type,
    ]);

    $from    = env('NOTIFY_EMAIL', 'noreply@apipay.is');
    $to      = $to_email;
    $subject = $subject;
    $message = $html;
    $headers = 'From: '. $from . "\r\n" .
        'Reply-To: '. $from . "\r\n" .
        'Content-Type: text/html; charset=UTF-8\r\n' .
        'X-Mailer: PHP/' . phpversion();

    $result = mail($to, $subject, $message, $headers);

    return $result;
  }
}
