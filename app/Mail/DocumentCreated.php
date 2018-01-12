<?php

namespace CRM\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DocumentCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $folio;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($folio)
    {
        $this->folio = $folio;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@humanbusiness.com.mx', 'Human Business Soporte')
                    ->subject('HB | Soporte folio: '.$this->folio)
                    ->markdown('emails.document');
    }
}
