<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::orderBy('id', 'desc')
            ->get();

        return response()->json([
            "data" => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $id = $request->id;
            if ($id) {
                $role = Role::find($id);
                $role->name = $request->name;
                $role->save();
                if ($role) {
                    // Return a response if needed
                    return response()->json(['message' => 'Role Updated successfully'], 200);
                }
            } else {
                // Store the data in the database
                $role = new Role();
                $role->name = $request->name;
                $role->save();

                // Return a response if needed
                return response()->json(['message' => 'Role stored successfully'], 200);
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            // Return an error response
            return response()->json(['error' => $ex->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role, Request $request)
    {
        $role = Role::find($request->id);
        $role->delete();
        return response()->json(['status' => 'Record Deleted Successfully']);
    }

    public function fetchRole(Request $request)
    {
        return view('backend.admin.pages.role.index');
    }
}
