<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\DemoEmail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send()
    {
        $objDemo = new \stdClass();
        $objDemo->demo_one = 'Demo One Value';
        $objDemo->demo_two = 'Demo Two Value';
        $objDemo->sender = 'SenderUserName';
        $objDemo->receiver = 'ReceiverUserName';

        Mail::to("ar5555789@gmail.com", 'Receiver name')->send(new DemoEmail($objDemo));
    }

    public function sendEmail()
    {
        sendMail('receiver_name', 'ar5555789@gmail.com', 'Registration', 'Registration sub', 'this is body');
    }
}