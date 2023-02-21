<?php

namespace App\Mail;

use App\Models\AccountVerification as AccountVerificationModel;
use Illuminate\Bus\Queueable;
/* use Illuminate\Contracts\Queue\ShouldQueue; */
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
	protected $accountVerification;

    public function __construct(AccountVerificationModel $data)
    {
		$this->accountVerification = $data;
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
