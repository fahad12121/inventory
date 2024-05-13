<?php

namespace App\Http\Controllers;

use App\Models\ParentCategory;
use Illuminate\Http\Request;

class ParentCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parentCategories = ParentCategory::select('id', 'name')
            ->orderBy('id', 'desc')
            ->get();
        return view('backend.admin.pages.parentcategory.index', compact('parentCategories'));
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
                $parentCategory = ParentCategory::find($id)->update($request->all());
                if ($parentCategory) {
                    // Return a response if needed
                    return response()->json(['message' => 'Category Updated successfully'], 200);
                }
            } else {
                // Store the data in the database
                $parentCategory = new ParentCategory();
                $parentCategory->name = $request->name;
                $parentCategory->save();

                // Return a response if needed
                return response()->json(['message' => 'Category stored successfully'], 200);
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            // Return an error response
            return response()->json(['error' => $ex->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ParentCategory $parentCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ParentCategory $parentCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ParentCategory $parentCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ParentCategory $parentCategory, Request $request)
    {
        $ParentCategory = ParentCategory::find($request->id);
        $ParentCategory->delete();
        return response()->json(['status' => 'Record Deleted Successfully']);
    }
}
