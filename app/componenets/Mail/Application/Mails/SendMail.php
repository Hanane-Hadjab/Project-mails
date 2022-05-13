<?php

namespace App\componenets\Mail\Application\Mails;

use App\componenets\Mail\Application\Models\Mail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mail;


    public function __construct(Mail $mail)
    {
       $this->mail = $mail;
    }

    public function build()
    {
        return $this
            ->subject($this->mail->getObject())
            ->markdown('mails.send_mail')
            ->with(['mail' => $this->mail]);
    }
}
