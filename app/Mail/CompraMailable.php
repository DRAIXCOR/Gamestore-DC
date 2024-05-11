<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CompraMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $nombres;
    public $juegos;
    public $precios;
    public $ofertas;
    public $Total;

    /**
     * Create a new message instance.
     *  @param array $juegos
     */

    public function __construct($nombres, $juegos, $precios, $ofertas, $Total)
    {
        $this->nombres = $nombres;
        $this->juegos = $juegos;
        $this->precios = $precios;
        $this->ofertas = $ofertas;
        $this->Total = $Total;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('gamestoredc@gsdc.com', 'Administración'),
            subject: 'Bienvenido a Gamestore DC',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.compra_realizada',
            //data: ['listas' => $this->listas]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
