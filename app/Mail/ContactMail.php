<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $sub;
    public $mess;
    public function __construct($subject,$message){
        $this->sub=$subject;
        $this->mess=$message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){
        $email_subject=$this->sub;
        $email_message=$this->mess;
        return $this->view('admin.contactus.email',compact('email_message'))->subject($email_subject);
    }
}
