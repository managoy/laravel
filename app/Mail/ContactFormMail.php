<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    private $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //using markdown
        //return $this->markdown('emails.contact.contact-form');

        return $this
            ->subject('Fake Subject for mail test')
            ->view('emails.contact.contact-mail')
            ->with([
                'name' =>$this->data['name'],
                'email' =>$this->data['email'],
                'description' =>$this->data['description'],
            ]);
    }
}
