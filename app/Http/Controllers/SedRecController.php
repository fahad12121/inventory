<?php

namespace App\Http\Controllers;

use App\Models\SedRec;
use Illuminate\Http\Request;

class SedRecController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $senrec = SedRec::orderBy('id', 'desc')
            ->get();

        return response()->json([
            "data" => $senrec
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
                $senrec = SedRec::find($id);
                $senrec->name = $request->name;
                $senrec->email = $request->email;
                $senrec->phone = $request->phone;
                $senrec->address = $request->address;
                $senrec->save();
                if ($senrec) {
                    // Return a response if needed
                    return response()->json(['message' => 'Record Updated successfully'], 200);
                }
            } else {
                // Store the data in the database
                $senrec = new SedRec();
                $senrec->name = $request->name;
                $senrec->email = $request->email;
                $senrec->phone = $request->phone;
                $senrec->address = $request->address;
                $senrec->save();

                // Return a response if needed
                return response()->json(['message' => 'Record stored successfully'], 200);
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            // Return an error response
            return response()->json(['error' => $ex->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SedRec $sedRec)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SedRec $sedRec)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SedRec $sedRec)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SedRec $sedRec)
    {
        $senrec = SedRec::find($request->id);
        $senrec->delete();
        return response()->json(['status' => 'Record Deleted Successfully']);
    }

    public function fetchSendRec(Request $request)
    {
        return view('backend.admin.pages.users.senderreceiver.index');
    }
}
