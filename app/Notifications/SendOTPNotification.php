<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendOTPNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
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
            ->Subject('Activation de vootre compte -Odin')
            ->greeting('bounjour'.$notifiable->name.'!')
            ->line('merci de vous etre inscrit sur odin')
            ->line('votre code de verfication (OTP) est :')
            ->line('**'.$notifiable->otp_code.'**')
            ->action('verficetion mon compte Action', url('/verify-otp'))
            ->line('Si vous n\'avez pas créé de compte, ignorez cet e-mail.');
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
