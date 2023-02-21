<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PasswordSetupController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;

use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Public users
Route::post('login', LoginController::class);
Route::post('register', RegisterController::class);
Route::post('password-setup', PasswordSetupController::class);
Route::post('forgot-password', ForgotPasswordController::class);

//Exports
// Route::get('transfer_request_items/data/{id}', [ExportController::class, 'TransferRequestItems']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('logout', LogoutController::class);
    Route::get('auth', [AuthController::class, 'index']);
    Route::post('auth', [AuthController::class, 'update']);
    Route::post('change-password', ChangePasswordController::class);

    // Users
    Route::get('get-all-users-active', [UserController::class, 'get_all_users_is_active']);
    Route::post('users/get_users_by_user_type', [UserController::class, 'user_list_by_user_types']);
    Route::post('change-password/{user_id}', [UserController::class, 'change_password']);
    Route::apiResource('users', UserController::class);
    });
