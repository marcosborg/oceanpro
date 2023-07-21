<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactNotification extends Notification
{
    use Queueable;

    private $contact;

    /**
     * Create a new notification instance.
     */
    public function __construct($contact)
    {
        $this->contact = $contact;
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
            ->subject('Pedido de contacto')
            ->greeting('Olá!')
            ->line('<strong>Nome: </strong>' . $this->contact->name)
            ->line('<strong>Email: </strong>' . $this->contact->email)
            ->line('<strong>Mensagem: </strong>' . $this->contact->message)
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