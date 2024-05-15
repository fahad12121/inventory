<?php

namespace App\Http\Controllers;

use App\Models\{Role, User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('role')->whereNotIn('role_id', [2])->get();

        return response()->json([
            "data" => $users
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
                $user = User::find($id);
                $user->name = $request->name;
                $user->email = $request->email;
                if ($request->password) {
                    $user->password = Hash::make($request->password);
                }
                $user->phone = $request->phone;
                $user->address = $request->address;
                $user->city = $request->city;
                $user->role_id = $request->role_id;
                $user->is_active = $request->is_active;
                $user->save();
                if ($user) {
                    // Return a response if needed
                    return response()->json(['message' => 'User Updated successfully'], 200);
                }
            } else {
                // Store the data in the database
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->phone = $request->phone;
                $user->address = $request->address;
                $user->city = $request->city;
                $user->role_id = $request->role_id;
                $user->is_active = $request->is_active;
                $user->save();

                // Return a response if needed
                return response()->json(['message' => 'User stored successfully'], 200);
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            // Return an error response
            return response()->json(['error' => $ex->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        $user = User::find($request->id);
        $user->delete();
        return response()->json(['status' => 'Record Deleted Successfully']);
    }

    public function fetchUser()
    {
        $roles = Role::all();
        return view('backend.admin.pages.users.index', compact('roles'));
    }
}
