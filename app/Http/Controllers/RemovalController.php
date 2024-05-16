<?php

namespace App\Http\Controllers;

use App\Models\{Removal, ProductItem};
use Illuminate\Http\Request;

class RemovalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $removals = Removal::with('itemNo', 'serialNo')->orderBy('id', 'desc')
            ->get();

        return response()->json([
            "data" => $removals
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

            // Store the data in the database
            $removal = new Removal();
            $removal->stock = $request->stock;
            $removal->item_no = $request->item_no;
            $removal->serial_no = $request->serial_no;
            $removal->reason = $request->reason;
            $removal->save();

            // Return a response if needed
            return response()->json(['message' => 'Removal stored successfully'], 200);
        } catch (\Illuminate\Database\QueryException $ex) {
            // Return an error response
            return response()->json(['error' => $ex->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Removal $removal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Removal $removal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Removal $removal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Removal $removal)
    {
        //
    }

    public function fetchRemoval()
    {
        $item_no = ProductItem::where(function ($query) {
            $query->where('is_branch_issued', 1)
                ->where('is_employee_issued', 0);
        })
            ->orWhere(function ($query) {
                $query->where('is_employee_issued', 1)
                    ->where('is_branch_issued', 0);
            })
            ->get();


        $serial_no = ProductItem::where(function ($query) {
            $query->where('is_branch_issued', 1)
                ->where('is_employee_issued', 0);
        })
            ->orWhere(function ($query) {
                $query->where('is_employee_issued', 1)
                    ->where('is_branch_issued', 0);
            })
            ->get();

        return view('backend.admin.pages.removal.index', compact('item_no', 'serial_no'));
    }
}
