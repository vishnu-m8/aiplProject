<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {       
        $this->data = $data;
       
    }

    public function build()
    {
        return $this->from('vishnu@matrixbricks.com')
                    ->subject('Contact Submission Aipl')
                    ->view('frontend.form');
    }
}