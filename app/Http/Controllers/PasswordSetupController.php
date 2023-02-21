<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\AccountVerification as AccountVerificationModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PasswordSetupController extends Controller
{
	// constructor
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
        $data = $request->only('token', 'password', 'password_confirmation');
        $password = $data['password'];
        $password_confirmation = $data['password_confirmation'];

        if ($password != $password_confirmation) {
			return response()->json(['message' => 'Passwords do not match.'], Response::HTTP_BAD_REQUEST);
        }

        $token = $data['token'];
		$parsedToken = AccountVerificationModel::parseJWT($token);

		$verificationInstance = AccountVerificationModel::where('token', $token)->first();
		if ($verificationInstance && $verificationInstance->is_used == true) {
			return response()->json(['message' => 'This token has already been used and is invalid.'], Response::HTTP_BAD_REQUEST);
		}

		if ($verificationInstance) {
			$verificationInstance->update(['is_used' => true]);
		}

		$user = User::findOrFail($parsedToken->user_id);
		if ($user) {
			$user->update(['password' => $password, 'is_active' => true, 'is_email_verified' => true]);
			return new UserResource($user->refresh());
		}

		return response()->json(['message' => 'User does not exist.'], Response::HTTP_NOT_FOUND);
    }
}
