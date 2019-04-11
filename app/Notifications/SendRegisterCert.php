<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SendRegisterCert extends Notification implements ShouldQueue
{
    use Queueable;

    protected $sender, $message, $request_id;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($sender, $message, $request_id)
    {
        $this->sender = $sender;
        $this->message = $message;
        $this->request_id = $request_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'sender_id' => $this->sender->id,
            'sender_name' => $this->sender->name,
            'sender_avatar' => $this->sender->avatar,
            'request_id' => $this->request_id,
            'message' => $this->message,
        ];
    }
}
