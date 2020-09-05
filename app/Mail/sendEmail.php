<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $senderemail;
    private $content;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($senderemail, $content)
    {
        $this->senderemail = $senderemail;
        $this->content = $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->to($this->senderemail);
        $this->subject($this->content);
        return $this->markdown('userRegistered',['user'=> $this->senderemail, 'subject' => $this->content]);
    }
}
