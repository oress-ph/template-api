<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRightController;
use App\Http\Controllers\SystemModuleController;


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

//Exports
// Route::get('transfer_request_items/data/{id}', [ExportController::class, 'TransferRequestItems']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('logout', LogoutController::class);
    Route::get('auth', [AuthController::class, 'index']);
    Route::post('auth', [AuthController::class, 'update']);
    Route::post('change-password', ChangePasswordController::class);
    // Users
    Route::get('get-all-users-active', [UserController::class, 'get_all_users_is_active']);
    Route::get('check-token', [UserController::class, 'check_token']);
    Route::post('users/get_users_by_user_type', [UserController::class, 'user_list_by_user_types']);
    Route::post('change-password/{user_id}', [UserController::class, 'change_password']);
    Route::get('users/get_user_dropdowns', [UserController::class, 'get_user_dropdown']);
    Route::apiResource('users', UserController::class);

    Route::post('user_rights/copy_user_rights/{current_user_id}', [UserRightController::class, 'copy_user_rights']);
    Route::apiResource('user_rights', UserRightController::class);
    Route::get('user_rights/by-user/{user_id}', [UserRightController::class, 'show_user_right_by_user']);
    Route::get('user-rights/by-login-user', [UserRightController::class, 'current_login_user_rights']);

    Route::get('system_modules/by-dropdown-list', [SystemModuleController::class, 'get_systems_module_lists']);
    Route::apiResource('system_modules', SystemModuleController::class);
});
