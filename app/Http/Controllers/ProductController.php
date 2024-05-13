<?php

namespace App\Http\Controllers;

use App\Models\{Product, Category, Brand};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('brand', 'category')->orderBy('id', 'desc')
            ->get();

        return response()->json([
            "data" => $products
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
                $product = Product::find($id);
                $product->brand_id = $request->brand_id;
                $product->category_id = $request->category_id;
                $product->name = $request->name;
                $product->imei_number = $request->imei_number;
                $product->warranty_date = $request->warranty_date;
                $product->purchase_cost = $request->purchase_cost;
                $product->sell_cost = $request->sell_cost;
                $product->alert_quantity = $request->alert_quantity;

                $product->save();
                if ($product) {
                    // Return a response if needed
                    return response()->json(['message' => 'Product Updated successfully'], 200);
                }
            } else {
                // Store the data in the database
                $product = new Product();
                $product->brand_id = $request->brand_id;
                $product->category_id = $request->category_id;
                $product->name = $request->name;
                $product->imei_number = $request->imei_number;
                $product->warranty_date = $request->warranty_date;
                $product->purchase_cost = $request->purchase_cost;
                $product->sell_cost = $request->sell_cost;
                $product->alert_quantity = $request->alert_quantity;
                $product->save();

                // Return a response if needed
                return response()->json(['message' => 'Product stored successfully'], 200);
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            // Return an error response
            return response()->json(['error' => $ex->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, Request $request)
    {
        $product = Product::find($request->id);
        $product->delete();
        return response()->json(['status' => 'Record Deleted Successfully']);
    }

    public function fetchProducts(Request $request)
    {
        $categories = Category::orderBy('id', 'desc')->get();
        $brands = Brand::orderBy('id', 'desc')->get();
        return view('backend.admin.pages.product.index', compact('brands', 'categories'));
    }

    //*** POST Request
    public function import(Request $request)
    {
        try {
            $filename = '';
            if ($file = $request->file('file')) {
                $filename = time() . '-' . $file->getClientOriginalName(); // Changed to getOriginalName()
                $file->move('products/', $filename);
            }

            $file = fopen(public_path('products/' . $filename), "r");
            $i = 1;

            while (($line = fgetcsv($file)) !== FALSE) {
                if ($i != 1) {
                    $category_id = $line[0] ? Category::whereName($line[0])->value('id') : null;
                    $brand_id = $line[1] ? Brand::whereName($line[1])->value('id') : null;

                    if (!$category_id) {
                        $category = new Category();
                        $category->parent_cat_id = null; // Assuming parent_cat_id is nullable
                        $category->name = $line[0];
                        $category->save();
                        $category_id = $category->id;
                    }
                    if (!$brand_id) {
                        $brand = new Brand();
                        $brand->name = $line[1];
                        $brand->save();
                        $brand_id = $brand->id;
                    }

                    $data = new Product();
                    $data->category_id = $category_id;
                    $data->brand_id = $brand_id;
                    $data->name = $line[2];
                    $data->imei_number = $line[3];
                    $data->warranty_date = $line[4];
                    $data->purchase_cost = $line[5];
                    $data->sell_cost = $line[6];
                    $data->alert_quantity = $line[7];
                    $data->save();
                }
                $i++;
            }
            fclose($file);

            return response()->json(['message' => 'File Imported Successfully']);
        } catch (\Throwable $th) {
            return back()->withError(__('Something is wrong!'));
        }
    }

    public function download()
    {
        $csvData = "category,brand,name,imei number, warranty date, purchase cost, sell cost, alert quantity\nexample,example,example, example, dd/mm/yyyy, example, example, example";

        return Response::make($csvData, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="product_example.csv"',
        ]);
    }

    public function listitems(Request $request, $id)
    {
        $product = Product::find($id);
        if ($product) {
            return view('backend.admin.pages.product.list_items', compact('product'));
        }
    }
}
