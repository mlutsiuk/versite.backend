<?php

namespace App\Containers\AppSection\Authentication\Notifications;

use App\Ship\Parents\Models\UserModel;
use App\Ship\Parents\Notifications\Notification as ParentNotification;
use Illuminate\Notifications\Messages\MailMessage;

class VerifyEmail extends ParentNotification
{
    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail(UserModel $notifiable): MailMessage
    {
        return (new MailMessage())    // TODO
            ->subject('Email Verification')
            ->line('Pls verify your email.');
    }
}
