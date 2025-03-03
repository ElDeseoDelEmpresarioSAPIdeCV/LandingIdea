<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PaymentConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $paymentDetails;

    public function __construct($paymentDetails)
    {
        $this->paymentDetails = $paymentDetails;
    }

    public function build()
    {
        return $this->subject('Confirmación de Pago - Webinar')
                    ->markdown('emails.payment_confirmation')
                    ->with('paymentDetails', $this->paymentDetails);
    }
}
