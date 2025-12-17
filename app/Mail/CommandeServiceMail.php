<?php

namespace App\Mail;

use App\Models\CommandeService;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CommandeServiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public CommandeService $commande;

    public function __construct(CommandeService $commande)
    {
        $this->commande = $commande;
    }

    public function build()
    {
        return $this->from('commercial@ticafrique.com', 'TicAfrique')
            ->subject('Nouvelle commande de service web')
            ->view('emails.commande_service');
    }
}
