<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DemoEmail extends Mailable
{
    use Queueable, SerializesModels;

    /** 
     * The demo object instance. 
     * 
     * @var Demo 
     */
    public $demo;

    /** 
     * Create a new message instance. 
     * 
     * @return void 
     */
    public function __construct($demo)
    {
        $this->demo = $demo;
    }

    /** 
     * Build the message. 
     * 
     * @return $this 
     */
    public function build()
    {
        return $this->from('noreply@styzeler.co.uk', 'hi there')
            ->view('emails.mail')
            ->text('emails.demo_plain')
            ->subject('check sub')
            ->with(
                [
                    'testVarOne' => '1',
                    'testVarTwo' => '2',
                ]
            );
        // ->attach(public_path('/images') . '/demo.jpg', [
        //     'as' => 'demo.jpg',
        //     'mime' => 'image/jpeg',
        // ]);
    }
}