<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = Branch::orderBy('id', 'desc')
            ->get();

        return response()->json([
            "data" => $branches
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
                $branch = Branch::find($id);
                $branch->name = $request->name;
                $branch->email = $request->email;
                $branch->phone = $request->phone;
                $branch->address = $request->address;
                $branch->save();
                if ($branch) {
                    // Return a response if needed
                    return response()->json(['message' => 'Branch Updated successfully'], 200);
                }
            } else {
                // Store the data in the database
                $branch = new Branch();
                $branch->name = $request->name;
                $branch->email = $request->email;
                $branch->phone = $request->phone;
                $branch->address = $request->address;
                $branch->save();

                // Return a response if needed
                return response()->json(['message' => 'Branch stored successfully'], 200);
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            // Return an error response
            return response()->json(['error' => $ex->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Branch $branch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Branch $branch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $branch)
    {
        //
    }

    public function fetchbranches(Request $request)
    {
        return view('backend.admin.pages.users.branch.index');
    }
}
