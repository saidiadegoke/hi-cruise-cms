<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PaymentApprovalRequested extends Mailable
{
    use Queueable, SerializesModels;

    protected $offline;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($offline)
    {
        $this->offline = $offline;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.payment-approval-requested', ['offline' => $this->offline]);
    }
}
