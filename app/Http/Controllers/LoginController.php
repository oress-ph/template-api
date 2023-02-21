<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use HumanIncubator\ErrorLog\ErrorLog;

class LoginController extends Controller
{
    // login as guest
    public function __construct()
    {
        $this->middleware('guest');
    }
    // login
    public function __invoke(Request $request)
    {
        $credentials = $request->only('email', 'username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->is_active == true) {
                $token = $user->createToken('token-name')->plainTextToken;

                return (new UserResource($user))->additional(compact('token'));
            } else {
                return response()->json([
                    'message' => 'User is deactivated',
                ], Response::HTTP_FORBIDDEN);
            }
        }

        return response()->json([
            'message' => 'Email or password is incorrect',
        ], Response::HTTP_UNAUTHORIZED);
    }
}
