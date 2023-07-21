<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewQuotation extends Notification
{
    use Queueable;

    private $quotation;

    /**
     * Create a new notification instance.
     */
    public function __construct($quotation)
    {
        $this->quotation = $quotation;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Pedido de cotação')
            ->greeting('Olá!')
            ->line('<strong>Nome: </strong>' . $this->quotation->first_name . ' ' . $this->quotation->last_name)
            ->line('<strong>Email: </strong>' . $this->quotation->email)
            ->line('<strong>Telefone: </strong>' . $this->quotation->phone)
            ->line('<strong>Assunto: </strong>' . $this->quotation->subject->title)
            ->line('<strong>Mensagem: </strong>' . $this->quotation->message)
            ->action('Ir para o site', url('https://oceanpro.pt/admin'))
            ->line('Obrigado por utilizar a nossa aplicação!')
            ->salutation('OceanPro');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}