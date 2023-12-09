<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\Artisan;

// require '../vendor/autoload.php';

class MailController extends Controller
{


    // public function sendMail($subject, $body, $from, $recipient, $recipient_name)
    public function sendMail()
    {
    
        sendMail("Welcome styzeler","meabdulrehmanazeem@gmail.com","name from","Subject of the email","this is the body of the email");
       
    }
    public function clearConfigCache()
    {
        // Clear configuration cache
        Artisan::call('config:clear');

        return 'Configuration cache cleared successfully.';
    }

    public function clearApplicationCache()
    {
        // Clear application cache
        Artisan::call('cache:clear');

        return 'Application cache cleared successfully.';
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