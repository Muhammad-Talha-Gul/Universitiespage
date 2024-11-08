<?php

namespace App\Mail;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Mail\Mailable;


class CustomEmail extends Mailable
{
    public function build()
    {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;                    // Enable verbose debug output
            $mail->isSMTP();                         // Set mailer to use SMTP
            $mail->Host = config('business80.web-hosting.com');       // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                  // Enable SMTP authentication
            $mail->Username = config('info@universitiespage.com'); // SMTP username
            $mail->Password = config('V;%beK7Hd%O-'); // SMTP password
            $mail->SMTPSecure = config('ssl'); // Enable TLS encryption, `ssl` also accepted
            $mail->Port = config('465');       // TCP port to connect to

            //Recipients
            $mail->setFrom(config('info@universitiespage.com'), config('Universities Page'));
            $mail->addAddress($this->to, $this->to_name);     // Add a recipient

            //Content
            $mail->isHTML(true);                     // Set email format to HTML
            $mail->Subject = $this->subject;
            $mail->Body    = $this->body;

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
