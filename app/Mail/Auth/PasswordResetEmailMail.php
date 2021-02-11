<?php

namespace App\Mail\Auth;

use App\Jobs\QueuePrefixesInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordResetEmailMail extends Mailable
{
    use Queueable, SerializesModels;

    // /**
    // * @var string $subject
    // */
    // public string $subject;

    /**
    * @var string $resetUrl
    */
    public string $resetUrl;

    /**
    * @var string $email
    */
    public string $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $email, string $token, string $userType = 'user')
    {
        // $this->subject = 'awd123456789011';       // __('email_subjects.forgot_password');
        $this->email = $email;
        $this->resetUrl = config('app.domain') . "/auth/password_recovery/{$userType}?" . $token;
        $this->onQueue(QueuePrefixesInterface::PREFIX_EMAILS);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.auth.forgot_password'); // ->subject($this->subject);
    }
}
