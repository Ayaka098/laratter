<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TweetLiked extends Notification
{
    use Queueable;

    private $likedBy;
    private $postId;


    /**
     * Create a new notification instance.
     */
    
    public function __construct($likedBy, $postId)
    {
        $this->likedBy = $likedBy;
        $this->postId = $postId;
    }


    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    
    public function via($notifiable): array
    {
        return ['database'];
    }

    public function toDatabase($notifiable): array
    {
        return [
            'liked_by' => $this->likedBy,
            'post_id' => $this->postId,
        ];
    }



    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
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
