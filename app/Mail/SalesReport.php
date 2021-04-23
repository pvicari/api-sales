<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SalesReport extends Mailable
{
    use Queueable, SerializesModels;

    private $vendas;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($vendas)
    {
        //
        $this->vendas = $vendas;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->subject('Daily Report')
        ->view('emails.saleReport')
        ->with(['vendas' => $this->vendas]);
    }
}
