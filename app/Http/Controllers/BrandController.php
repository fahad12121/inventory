<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::select('id', 'name')
            ->orderBy('id', 'desc')
            ->get();

        return response()->json([
            "data" => $brands
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
                $brand = Brand::find($id)->update($request->all());
                if ($brand) {
                    // Return a response if needed
                    return response()->json(['message' => 'Brand Updated successfully'], 200);
                }
            } else {
                // Store the data in the database
                $brand = new Brand();
                $brand->name = $request->name;
                $brand->save();

                // Return a response if needed
                return response()->json(['message' => 'Brand stored successfully'], 200);
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            // Return an error response
            return response()->json(['error' => $ex->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand, Request $request)
    {
        $brand = Brand::find($request->id);
        $brand->delete();
        return response()->json(['status' => 'Record Deleted Successfully']);
    }

    public function fetchBrands()
    {
        return view('backend.admin.pages.brand.index');
    }
}
