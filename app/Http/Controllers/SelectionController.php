<?php

namespace App\Http\Controllers;

use App\Http\Resources\SelectionResource;
use App\Models\Selection;
use App\Models\UserRight;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class SelectionController extends Controller
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
            $query->where('system_module', 'Administration - Selections');
        })
            ->where('user_id', Auth::user()->id)
            ->get();

        if ($user_rights->count() > 0) {

            $keywords = $request->keywords;
            $selection = Selection::where(function ($query) use ($keywords) {
                if ($keywords) {
                    $query->where('code', 'like', '%' . $keywords . '%')
                        ->Orwhere('value', 'like', '%' . $keywords . '%')
                        ->Orwhere('category', 'like', '%' . $keywords . '%')
                        ->Orwhere('particulars', 'like', '%' . $keywords . '%');
                }
            })
                ->orderBy('id', 'DESC')
                ->paginate();

            return SelectionResource::collection($selection);
        } else {
            return response()->json(['message' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function selection_by_category(Request $request)
    {
        $selection = Selection::where('category', $request->category)
            ->orderBy('id', 'DESC')
            ->get();

        return SelectionResource::collection($selection);
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
            $query->where('system_module', 'Administration - Selections');
        })
            ->where('user_id', Auth::user()->id)
            ->get();

        if ($user_rights->count() > 0) {

            $selection = Selection::findOrFail($id);

            return new SelectionResource($selection);
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
                $query->where('system_module', 'Administration - Selections');
            })
                ->where('user_id', Auth::user()->id)
                ->get();

            if ($user_rights->count() > 0) {

                if ($user_rights[0]->can_add == true) {

                    $selection = Selection::create($request->all());
                    return new SelectionResource($selection);
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
                $query->where('system_module', 'Administration - Selections');
            })
                ->where('user_id', Auth::user()->id)
                ->get();

            if ($user_rights->count() > 0) {

                if ($user_rights[0]->can_edit == true) {

                    $selection = Selection::findOrFail($id);
                    $selection->update($request->all());

                    return new SelectionResource($selection->refresh());
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
                $query->where('system_module', 'Administration - Selections');
            })
                ->where('user_id', Auth::user()->id)
                ->get();

            if ($user_rights->count() > 0) {

                if ($user_rights[0]->can_delete == true) {

                    $selection = Selection::findOrFail($id);
                    $selection->delete();

                    return response()->noContent();
                } else
                    return response()->json(['message' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
            } else
                return response()->json(['message' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);

    }
}
