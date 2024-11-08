<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $messageContent;

    public function __construct($message)
    {
        $this->messageContent = $message;
    }

    public function build()
    {
        return $this->from('info@universitiespage.com', 'University Pages')
                    ->subject('Test Email from University Pages')
                    ->view('emails.test');
    }
}