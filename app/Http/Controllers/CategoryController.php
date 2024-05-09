<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ParentCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parentCategories = ParentCategory::select('id', 'name')
            ->orderBy('id', 'desc')
            ->get();
        $categories = Category::with('parentCategory')->select('id', 'name', 'img', 'parent_cat_id')
            ->orderBy('id', 'desc')
            ->get();
        return view('backend.admin.pages.product.category.index', compact('parentCategories', 'categories'));
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
                $category = Category::find($id);
                $category->name = $request->name;
                $category->parent_cat_id = $request->parent_cat_id;

                // Handle image upload
                if ($request->hasFile('img')) {
                    $category->img = $category->uploadImg($request->file('img'));
                    $category->save();
                }
                $category->save();
                if ($category) {
                    // Return a response if needed
                    return response()->json(['message' => 'Category Updated successfully'], 200);
                }
            } else {
                // Store the data in the database
                $category = new Category();
                $category->name = $request->name;
                $category->parent_cat_id = $request->parent_cat_id;

                // Handle image upload
                if ($request->hasFile('img')) {
                    $category->img = $category->uploadImg($request->file('img'));
                    $category->save();
                }

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
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category, Request $request)
    {
        $category = Category::find($request->id);
        $category->delete();
        return response()->json(['status' => 'Record Deleted Successfully']);
    }
}
