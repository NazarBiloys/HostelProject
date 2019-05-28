<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailCLass extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $email;
    protected $messages;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$email,$messages)
    {
        $this->name = $name;
        $this->email = $email;
        $this->messages = $messages;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contact-mails')->with([
            'name' => $this->name,
            'email' => $this->email,
            'messages' => $this->messages,
        ])->subject('Нове повідомлення');
    }
}
