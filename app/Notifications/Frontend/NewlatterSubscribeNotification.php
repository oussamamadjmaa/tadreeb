<?php

namespace App\Notifications\Frontend;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewlatterSubscribeNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $newlatter;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($newlatter)
    {
        $this->newlatter = $newlatter;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('تم الإشتراك في النشرة البريدية بنجاح')
                    ->line('لقد قمت بالاشتراك في النشرة البريدية لموقع '.config('app.name').' بنجاح.')
                    ->action('إلغاء الإشتراك', route('unsubscribe', ['id' => $this->newlatter->id, 'email' => $this->newlatter->email]))
                    ->line('إذ كنت ترغب في إلغاء الإشتراك  يمكن الضغظ على زر إلغاء الإشتراك!');
    }

}
