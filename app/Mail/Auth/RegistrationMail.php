<?php

namespace App\Mail\Auth;

use App\Jobs\QueuePrefixesInterface;
use App\Models\EmailConfirmation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

    // /**
    // * @var string $subject
    // */
    // public string $subject;

    /**
    * @var string $emailConfirmationUrl
    */
    public string $emailConfirmationUrl;

    /**
    * @var Model $authModel
    */
    public Model $authModel;

    /**
    * @var string $guard
    */
    public string $guard;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(EmailConfirmation $emailConfirmation, Model $authModel, string $guard)
    {
        // $this->subject = 'awd1234567890';       // __('email_subjects.welcome');
        $this->guard = $guard;
        $this->authModel = $authModel;
        $this->emailConfirmationUrl = config('app.domain') . "/auth/login/{$this->guard}?" . $emailConfirmation->token;
        $this->onQueue(QueuePrefixesInterface::PREFIX_EMAILS);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.auth.registration'); // ->subject($this->subject);
    }
}
