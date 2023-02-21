<?php

namespace App\Mail;

use App\Models\AccountVerification as AccountVerificationModel;
use Illuminate\Bus\Queueable;
/* use Illuminate\Contracts\Queue\ShouldQueue; */
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
	protected $forgotPassword;

    public function __construct(AccountVerificationModel $data)
    {
		$this->forgotPassword = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.forgot-password')->with(['data'=>$this->accountVerification]);
    }
}
