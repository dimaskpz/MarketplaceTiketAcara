<?php

namespace App\Mail;
use App\Transaksi;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PesananPosted extends Mailable
{
    use Queueable, SerializesModels;
    public $transaksi;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Transaksi $transaksi)
    {
        $this->transaksi = $transaksi;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@vihosystem.com')->view('emails.pesanan');
    }
}
