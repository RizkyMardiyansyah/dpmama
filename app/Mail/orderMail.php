<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Attachment;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class orderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $snapToken;
    public $subs;
    public $template;

    /**
     * Create a new message instance.
     */
    public function __construct($data, $snapToken, $subs, $template)
    {
        $this->data = $data;
        $this->snapToken = $snapToken;
        $this->subs = $subs;
        $this->template = $template;
        
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Order Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'orderMail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
         // Menggunakan embed() untuk menambahkan gambar dengan Content-ID
         $path = storage_path('app/public/img/kop.png'); // Path gambar

        return [
            Attachment::fromPath($path) // Menambahkan gambar sebagai lampiran
                ->as('kop.png') // Nama file gambar
                ->withMime('image/png') // MIME type untuk gambar PNG
                ->embedAs('kopImage')
        ];
    }
}