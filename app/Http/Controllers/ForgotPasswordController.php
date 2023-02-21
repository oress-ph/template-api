<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AccountVerification;
use App\Mail\ForgotPassword as ForgotPasswordEmail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;

class ForgotPasswordController extends Controller
{
	public function __construct()
	{
        $this->middleware('guest');
	}

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $data = $request->only('email');
		$email = $data['email'];

		$user = User::where("email", $email)->first();
		if (!$user) {
			return response()->json(['message' => 'User with given email not found.'], Response::HTTP_NOT_FOUND);
		}

		if ($user->is_active == false) {
			return response()->json(['message' => 'User has been deactivated.'], Response::HTTP_BAD_REQUEST);
		}

		// create verification token
		$jwt = AccountVerification::generateJWT($user->id, date(DATE_ISO8601));
		$verificationToken = AccountVerification::create([
			'user_id' => $user->id,
			'token' => $jwt,
			'expiry' => date(DATE_ISO8601, strtotime("+ 5min")),
			'is_used' => false,
		]);

		$setupLink = Config::get('app.url').'/security/password-setup?token='.$verificationToken->token;

		$emailData = $verificationToken;
		$emailData->token = $setupLink;
		$emailData->name = $user->name;
		$emailData->username = $user->username;

		Mail::to($user->email)->send(new ForgotPasswordEmail($emailData));

		return response()->json(['message' => 'Success. Please check your email for a pasword reset request.'], Response::HTTP_CREATED);
    }
}
