<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserRightResource;
use App\Models\UserRight;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserRightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_rights = UserRight::whereHas('system_module', function ($query) {
            $query->where('system_module', 'Administration - User Detail');
        })
            ->where('user_id', Auth::user()->id)
            ->get();

        if ($user_rights->count() > 0) {

            $user_rights = UserRight::all();

            return UserRightResource::collection($user_rights);
        } else {
            return response()->json(['message' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
        }
    }

    /**
     * Display the specified resource by currnt login.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function current_login_user_rights()
    {
        $user_rights = UserRight::with('user', 'system_module')
            ->where('user_id', Auth::user()->id)
            ->get();

        return UserRightResource::collection($user_rights);
    }

    /**
     * Display the specified resource by user id.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_user_right_by_user($id)
    {
        $user_rights = UserRight::whereHas('system_module', function ($query) {
            $query->where('system_module', 'Administration - User Detail');
        })
            ->where('user_id', Auth::user()->id)
            ->get();

        if ($user_rights->count() > 0) {

            $user_rights = UserRight::with('user', 'system_module')
                ->where('user_id', $id)
                ->orderBy('id', 'DESC')
                ->paginate();

            return UserRightResource::collection($user_rights);
        } else {
            return response()->json(['message' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_rights = UserRight::whereHas('system_module', function ($query) {
            $query->where('system_module', 'Administration - User Detail');
        })
            ->where('user_id', Auth::user()->id)
            ->get();

        if ($user_rights->count() > 0) {

            $user_right = UserRight::with('user', 'system_module')
                ->findOrFail($id);

            return new UserRightResource($user_right);
        } else {
            return response()->json(['message' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function copy_user_rights($current_user_id, Request $request) {

        $from_user_id = $request->from_user_id;

        $user_rights = UserRight::whereHas('system_module', function ($query) {
            $query->where('system_module', 'Administration - User Detail');
        })
            ->where('user_id', Auth::user()->id)
            ->get();

        if ($user_rights->count() > 0) {

            $current_user_rights = UserRight::where('user_id', $current_user_id)->get();

            // return $current_user_rights
            
            if($current_user_rights->count() > 0) {

                UserRight::where('user_id', $current_user_id)->delete();
            
                // return $current_user_rights;
            }

            $user_right = UserRight::where('user_id', $from_user_id)->get();

            foreach($user_right as $item) {

                $data[] = [
                    'id' => 0,
                    'system_module_id' => $item->system_module_id,
                    'user_id' => $current_user_id,
                    'can_add' => $item->can_add,
                    'can_save' => $item->can_save,
                    'can_edit' => $item->can_edit,
                    'can_delete' => $item->can_delete,
                    'can_print' => $item->can_print,
                    'can_lock' => $item->can_lock,
                    'can_unlock' => $item->can_unlock,
                    'deleted_at' => null,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            }
            // return $data;
            UserRight::insert($data);
            return response()->json(['message' => 'Successful'], Response::HTTP_OK);
        } else
            return response()->json(['message' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
            $user_rights = UserRight::whereHas('system_module', function ($query) {
                $query->where('system_module', 'Administration - User Detail');
            })
                ->where('user_id', Auth::user()->id)
                ->get();

            if ($user_rights->count() > 0) {

                if ($user_rights[0]->can_add == true) {

                    $user_rights = UserRight::where('system_module_id', $request->system_module_id)
                        ->where('user_id', $request->user_id)
                        ->get();

                    if ($user_rights->count() == 0) {

                        $user_right = UserRight::create($request->all());
                        return new UserRightResource($user_right);
                    } else
                        return response()->json(['message' => 'Already Exist'], Response::HTTP_CONFLICT);
                } else
                    return response()->json(['message' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
            } else
                return response()->json(['message' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
            $user_rights = UserRight::whereHas('system_module', function ($query) {
                $query->where('system_module', 'Administration - User Detail');
            })
                ->where('user_id', Auth::user()->id)
                ->get();

            if ($user_rights->count() > 0) {

                if ($user_rights[0]->can_edit == true) {

                    $user_right = UserRight::findOrFail($id);
                    $user_right->update($request->all());

                    return new UserRightResource($user_right->refresh());
                } else
                    return response()->json(['message' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
            } else
                return response()->json(['message' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
            $user_rights = UserRight::whereHas('system_module', function ($query) {
                $query->where('system_module', 'Administration - User Detail');
            })
                ->where('user_id', Auth::user()->id)
                ->get();

            if ($user_rights->count() > 0) {

                if ($user_rights[0]->can_delete == true) {

                    $user_right = UserRight::findOrFail($id);
                    $user_right->delete();

                    return response()->noContent();
                } else
                    return response()->json(['message' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
            } else
                return response()->json(['message' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);

    }
}
