<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class WelcomeEmailNotification extends Notification
{
    use Queueable;

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Selamat Datang!')
            ->line('Terima kasih telah mendaftar di aplikasi kami.')
            ->line('Kami sangat senang menyambut Anda sebagai pengguna baru.')
            ->action('Login Sekarang', url('/login'))
            ->line('Jika Anda memiliki pertanyaan, jangan ragu untuk menghubungi kami.');
    }
}
