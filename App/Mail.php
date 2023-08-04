<?php

namespace App;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// require 'vendor/PHPMailer/src/Exception.php';
// require 'vendor/PHPMailer/src/PHPMailer.php';
// require 'vendor/PHPMailer/src/SMTP.php';


/**
 * Mail
 *
 * PHP version 7.0
 */
class Mail
{

    /**
     * Send a message
     *
     * @param string $to Recipient
     * @param string $subject Subject
     * @param string $text Text-only content of the message
     * @param string $html HTML content of the message
     *
     * @return mixed
     */
    public static function send($to, $subject, $text, $html)
    {
        $mail = new PHPMailer(true);

        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        try {
            $mail->isSMTP();
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            // $mail->SMTPDebug = 2;
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'maciej.pulka.programista@gmail.com';
            $mail->Password = 'jooevhfntzkinyoc';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('maciej.pulka.programista@gmail.com');
            $mail->addAddress('maciej.piotr.pulka@gmail.com');
            $mail->Subject = $subject;
            $mail->Body = $text;

            $mail->send();
        } catch (Exception $e) {
            $errors[] = $mail->ErrorInfo;
        }
    }
}