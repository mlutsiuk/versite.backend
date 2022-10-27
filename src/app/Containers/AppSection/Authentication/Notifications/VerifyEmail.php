<?php

namespace App\Containers\AppSection\Authentication\Notifications;

use App\Containers\AppSection\Authentication\Tasks\HashEmailTask;
use App\Ship\Parents\Models\UserModel;
use App\Ship\Parents\Notifications\Notification as ParentNotification;
use Illuminate\Notifications\Messages\MailMessage;
use URL;

class VerifyEmail extends ParentNotification
{
    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail(UserModel $notifiable): MailMessage
    {
        $url = URL::route('auth.verify-email', [
            'id' => $notifiable->getHashedKey(),
            'hash' => app(HashEmailTask::class)->run($notifiable->getEmailForVerification())
        ]);

        return (new MailMessage())
            ->line('Please click the button below to verify your email address.')    // TODO: Locales
            ->action('Verify Email Address', $url)
            ->line('If you did not create an account, no further action is required.');
    }
}
