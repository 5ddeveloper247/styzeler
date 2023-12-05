<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// require '../vendor/autoload.php';

class MailController extends Controller
{


    // public function sendMail($subject, $body, $from, $recipient, $recipient_name)
    public function sendMail()
    {
    
        sendMail("Welcome styzeler","adnanyar143@gmail.com","adnanyar143@gmail.com","Subject of the email","this is the body of the email");
       
    }
}

 // try {

        //     $mail = new PHPMailer();
        //     $mail->CharSet = "UTF-8";

        //     $mail->setFrom('my@live.com');

        //     $mail->addCC('');
        //     $mail->isHTML(true);
        //     $mail->Subject = 'subject';
        //     $mail->Body    = 'hi this is body';
        //     $mail->AltBody = '';
        //     $mail->addAddress('ar5555789@gmail.com', 'My name');
        //     if (!$mail->send()) throw new Exception('Failed to send mail');
        // } catch (Exception $e) {
        //     throw new Exception($e->getMessage());
        // }