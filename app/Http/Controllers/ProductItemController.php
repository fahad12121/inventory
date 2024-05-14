<?php

namespace App\Http\Controllers;

use App\Models\ProductItem;
use Illuminate\Http\Request;

class ProductItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $productItems = ProductItem::with('product', 'category')->where(['product_id' => $id])->orderBy('id', 'desc')
            ->get();

        return response()->json([
            "data" => $productItems
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
                $productItem = ProductItem::find($id);
                $productItem->category_id = $request->category_id;
                $productItem->product_id = $request->product_id;
                $productItem->item_no = $request->item_no;
                $productItem->serial_no = $request->serial_no;

                $productItem->save();
                if ($productItem) {
                    // Return a response if needed
                    return response()->json(['message' => 'Product Item Updated successfully'], 200);
                }
            } else {
                // Store the data in the database
                $productItem = new ProductItem();
                $productItem->category_id = $request->category_id;
                $productItem->product_id = $request->product_id;
                $productItem->item_no = $request->item_no;
                $productItem->serial_no = $request->serial_no;
                $productItem->save();

                // Return a response if needed
                return response()->json(['message' => 'Product Item stored successfully'], 200);
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            // Return an error response
            return response()->json(['error' => $ex->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductItem $productItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductItem $productItem)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductItem $productItem)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductItem $productItem, Request $request)
    {
        $productItem = ProductItem::find($request->id);
        $productItem->delete();
        return response()->json(['status' => 'Record Deleted Successfully']);
    }

    public function import(Request $request)
    {
        try {
            $filename = '';
            if ($file = $request->file('file')) {
                $filename = time() . '-' . $file->getClientOriginalName(); // Changed to getOriginalName()
                $file->move('productsItems/', $filename);
            }

            $file = fopen(public_path('productsItems/' . $filename), "r");
            $i = 1;

            while (($line = fgetcsv($file)) !== FALSE) {
                if ($i != 1) {
                    $category_id = $line[0] ? Category::whereRaw('LOWER(name) = ?', [strtolower($line[0])])->value('id') : null;
                    $product_id = $line[1] ? Product::whereRaw('LOWER(name) = ?', [strtolower($line[1])])->value('id') : null;

                    if (!$category_id) {
                        $category = new Category();
                        $category->parent_cat_id = null; // Assuming parent_cat_id is nullable
                        $category->name = $line[0];
                        $category->save();
                        $category_id = $category->id;
                    }
                    if (!$product_id) {
                        $product = new Product();
                        $product->name = $line[1];
                        $product->category_id = $category_id;
                        $product->save();
                        $product_id = $product->id;
                    }

                    $data = new ProductItem();
                    $data->category_id = $category_id;
                    $data->product_id = $product_id;
                    $data->item_no = $line[2];
                    $data->serial_no = $line[3];
                    $data->save();
                }
                $i++;
            }
            fclose($file);

            return response()->json(['message' => 'File Imported Successfully']);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'something went wrong']);
        }
    }
}
