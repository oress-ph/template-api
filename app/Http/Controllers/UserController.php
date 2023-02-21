<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRight;
use App\Http\Resources\UserResource;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;
use Exception;

class UserController extends Controller
{
    // display list with filter
    public function index(Request $request)
    {
        $user_rights = UserRight::whereHas('system_module', function ($query) {
            $query->where('system_module', 'Administration - Users');
        })
            ->where('user_id', Auth::user()->id)
            ->get();

        if ($user_rights->count() > 0) {

            $keywords = $request->keywords;
            $users = User::where(function ($query) use ($keywords) {
                if ($keywords) {
                    $query->where('username', 'like', '%' . $keywords . '%')
                        ->Orwhere('name', 'like', '%' . $keywords . '%')
                        ->Orwhere('email', 'like', '%' . $keywords . '%')
                        ->Orwhere('user_type', 'like', '%' . $keywords . '%');
                }
            })
                ->orderBy('id', 'DESC')
                ->paginate();

            return UserResource::collection($users);
        } else {
            return response()->json(['message' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function check_token()
    {
        $user = Auth::User();
        $user_token = $user->currentAccessToken();
        if ($user_token->tokenable !== null) return response()->json(['authorized' => true]);
    }

    public function user_list_by_user_types(Request $request)
    {
        $user_rights = UserRight::whereHas('system_module', function ($query) {
            $query->where('system_module', 'Administration - Users');
        })
            ->where('user_id', Auth::user()->id)
            ->get();

        if ($user_rights->count() > 0) {
            $user_types = $request->all();
            $users = User::where(function ($query) use ($user_types) {
                foreach ($user_types as $user_type) {
                    $query->orWhere('user_type', $user_type);
                }
            })
                ->where('is_active', true)
                ->get();

            return UserResource::collection($users);
        } else {
            return response()->json(['message' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function get_all_users_is_active()
    {
        $users = User::with('user_rights')->where('is_active', true)
            ->get();

        $user_list = array();
        foreach ($users as $user) {
            if ($user->user_rights->count() > 0) {
                array_push($user_list, $user);
            }
        }

        return UserResource::collection($user_list);
    }

    // detail by email
    public function user_by_email(Request $request): AnonymousResourceCollection
    {
        $user_rights = UserRight::whereHas('system_module', function ($query) {
            $query->where('system_module', 'Administration - Users');
        })
            ->where('user_id', Auth::user()->id)
            ->get();

        if ($user_rights->count() > 0) {

            $email = $request->email;
            $users = User::where('email', $email)->get();

            return UserResource::collection($users);
        } else {
            return response()->json(['message' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
        }
    }
    // detail by username
    public function user_by_username(Request $request): AnonymousResourceCollection
    {
        $user_rights = UserRight::whereHas('system_module', function ($query) {
            $query->where('system_module', 'Administration - Users');
        })
            ->where('user_id', Auth::user()->id)
            ->get();

        if ($user_rights->count() > 0) {

            $username = $request->username;
            $users = User::where('username', $username)->get();

            return UserResource::collection($users);
        } else {
            return response()->json(['message' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
        }
    }

    // edit
    public function update(UserRequest $request, $id)
    {

        $user_rights = UserRight::whereHas('system_module', function ($query) {
            $query->where('system_module', 'Administration - Users');
        })
            ->where('user_id', Auth::user()->id)
            ->get();

        if ($user_rights->count() > 0) {

            if ($user_rights[0]->can_edit == true) {

                $user = User::find($id);

                $user->name = $request->name;
                $user->user_type = $request->user_type;
                $user->username = $request->username;
                $user->warehouse_id = $request->warehouse_id;
                // $user->password =   $request->password;
                $user->is_active = $request->is_active;
                $user->save();

                return new UserResource($user->refresh());
            } else
                return response()->json(['message' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
        } else
            return response()->json(['message' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
    }

    public function change_password(Request $request, $id): UserResource
    {

        $user_rights = UserRight::whereHas('system_module', function ($query) {
            $query->where('system_module', 'Administration - Users');
        })
            ->where('user_id', Auth::user()->id)
            ->get();

        if ($user_rights->count() > 0) {

            $user = User::find($id);

            // if (Hash::check($request->password, $user->password)) {
            //             $user->password = bcrypt($request->password);
            //             $user->save();
            //         }
            $user->password = $request->new_password;
            $user->save();

            return new UserResource($user->refresh());
        } else
            return response()->json(['message' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
    }

    public function show($id)
    {
        $user_rights = UserRight::whereHas('system_module', function ($query) {
            $query->where('system_module', 'Administration - Users');
        })
            ->where('user_id', Auth::user()->id)
            ->get();

        if ($user_rights->count() > 0) {

            $user = User::with('warehouse')->findOrFail($id);

            return new UserResource($user);
        } else
            return response()->json(['message' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
    }

    public function destroy($id)
    {

        $user_rights = UserRight::whereHas('system_module', function ($query) {
            $query->where('system_module', 'Administration - Users');
        })
            ->where('user_id', Auth::user()->id)
            ->get();

        if ($user_rights->count() > 0) {

            if ($user_rights[0]->can_delete == true) {

                $storage_type = User::findOrFail($id);
                $storage_type->delete();

                return response()->noContent();
            } else
                return response()->json(['message' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
        } else
            return response()->json(['message' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
    }
    public function get_user_dropdown(Request $request)
    {
        $user_rights = UserRight::whereHas('system_module', function ($query) {
            $query->where('system_module', 'Administration - Users');
        })
            ->where('user_id', Auth::user()->id)
            ->get();

        if ($user_rights->count() > 0) {

            $keywords = $request->keywords;
            $users = User::where(function ($query) use ($keywords) {
                if ($keywords) {
                    $query->where('username', 'like', '%' . $keywords . '%')
                        ->Orwhere('name', 'like', '%' . $keywords . '%')
                        ->Orwhere('email', 'like', '%' . $keywords . '%')
                        ->Orwhere('user_type', 'like', '%' . $keywords . '%');
                }
            })
                ->orderBy('id', 'DESC')
                ->get();

            return UserResource::collection($users);
            // return $users;
        } else {
            return response()->json(['message' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
        }
    }
}
