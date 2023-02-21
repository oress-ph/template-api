<?php

namespace App\Http\Controllers;

use App\Http\Resources\SystemModuleResource;
use App\Models\SystemModule;
use App\Models\UserRight;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class SystemModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // display list with filter
    public function index(Request $request)
    {

        $user_rights = UserRight::whereHas('system_module', function ($query) {
            $query->where('system_module', 'Administration - Modules');
        })
            ->where('user_id', Auth::user()->id)
            ->get();

        if ($user_rights->count() > 0) {

            $keywords = $request->keywords;
            $system_modules = SystemModule::where(function ($query) use ($keywords) {
                if ($keywords) {
                    $query->where('system_module', 'like', '%' . $keywords . '%')
                        ->Orwhere('description', 'like', '%' . $keywords . '%');
                }
            })
                ->orderBy('id', 'DESC')
                ->paginate();

            return SystemModuleResource::collection($system_modules);
        } else {
            return response()->json(['message' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_systems_module_lists()
    {
        $system_modules = SystemModule::all();
        return SystemModuleResource::collection($system_modules);
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
            $query->where('system_module', 'Administration - Modules');
        })
            ->where('user_id', Auth::user()->id)
            ->get();

        if ($user_rights->count() > 0) {

            $system_module = SystemModule::findOrFail($id);

            return new SystemModuleResource($system_module);
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
                $query->where('system_module', 'Administration - Modules');
            })
                ->where('user_id', Auth::user()->id)
                ->get();

            if ($user_rights->count() > 0) {

                if ($user_rights[0]->can_add == true) {

                    $system_module = SystemModule::create($request->all());
                    return new SystemModuleResource($system_module);
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
                $query->where('system_module', 'Administration - Modules');
            })
                ->where('user_id', Auth::user()->id)
                ->get();

            if ($user_rights->count() > 0) {

                if ($user_rights[0]->can_edit == true) {

                    $system_module = SystemModule::findOrFail($id);
                    $system_module->update($request->all());

                    return new SystemModuleResource($system_module->refresh());
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
                $query->where('system_module', 'Administration - Modules');
            })
                ->where('user_id', Auth::user()->id)
                ->get();

            if ($user_rights->count() > 0) {

                if ($user_rights[0]->can_delete == true) {

                    $system_module = SystemModule::findOrFail($id);

                    if ($system_module->user_rights()->exists()) {
                        return response()->json(['message' => "Module is used by other table."], Response::HTTP_INTERNAL_SERVER_ERROR);
                    }

                    $system_module->delete();

                    return response()->noContent();
                } else
                    return response()->json(['message' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
            } else
                return response()->json(['message' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);

    }
}
