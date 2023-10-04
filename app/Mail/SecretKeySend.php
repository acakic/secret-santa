<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SecretKeySend extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $userInfo, User $user)
    {
        $this->userInfo = $userInfo;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('typo3.in.rs@gmail.com')
            ->subject('JustRaspberry Secret Santa')
            ->view('email.secret-santa-key', [
                'key' => $this->userInfo['key'],
                'name' => $this->user->name,
            ]);
    }
}
