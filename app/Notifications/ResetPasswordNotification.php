<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public string $token)
    {
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
        $url = route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ]);

        return (new MailMessage)
            ->subject('Reset Kata Sandi - Amma Science Kids')
            ->greeting('Halo, ' . ($notifiable->name ?? 'Ilmuwan Hebat') . '!')
            ->line('Kami menerima permintaan untuk mereset kata sandi akun Amma Science Kids Anda.')
            ->action('Atur Ulang Kata Sandi', $url)
            ->line('Tautan reset kata sandi ini akan kedaluwarsa dalam 60 menit.')
            ->line('Jika Anda tidak merasa meminta pengaturan ulang kata sandi, abaikan email ini.')
            ->salutation("Salam hangat,\nTim Amma Science Kids");
    }
}

