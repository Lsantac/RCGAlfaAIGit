<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class ContatoMail extends Mailable
    {
        use Queueable, SerializesModels;
    
        public $data;
        public $subject;
        public $details;
    
        public function __construct($data, $subject, $details)
        {
            $this->data = $data;
            $this->subject = $subject;
            $this->details = $details;
        }
    
        public function build()
        {
            return $this->view('emails.EnviarMail')
                        ->subject($this->subject)
                        ->with($this->data);
        }

    }    