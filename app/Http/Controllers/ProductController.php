<?php

namespace App\Http\Controllers;

use App\Models\{Product, Category, Brand};
use Illuminate\Http\Request;

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
        $brand = Product::find($request->id);
        $brand->delete();
        return response()->json(['status' => 'Record Deleted Successfully']);
    }

    public function fetchProducts(Request $request)
    {
        $categories = Category::orderBy('id', 'desc')->get();
        $brands = Brand::orderBy('id', 'desc')->get();
        return view('backend.admin.pages.product.products.index', compact('brands', 'categories'));
    }

    //*** POST Request
    public function import(Request $request)
    {

        try {
            $filename = '';
            if ($file = $request->file('file')) {
                $filename = time() . '-' . $file->getClientOriginalExtension();
                $file->move('products/', $filename);
            }

            $file = fopen(public_path('products/' . $filename), "r");
            $i = 1;

            while (($line = fgetcsv($file)) !== FALSE) {

                if ($i != 1) {

                    $category_id = $line[0] ? (Category::whereName($line[0])->exists() ? Category::whereName($line[0])->first()->id : 0) : 0;
                    $brand_id = $line[1] ? (Brand::whereName($line[1])->exists() ? Brand::whereName($line[1])->first()->id : 0) : 0;
                    dd($brand_id);
                    exit();
                    $area = Area::whereIn('name', $names)->get();
                    $names = [];
                    foreach ($name as $key => $value) {
                        if (in_array($value, $area->pluck('name')->toArray())) {
                            $names[$prices[$key]] = $value;
                        }
                    }

                    if (count($names) > 0) {
                        $i = 0;
                        foreach ($names as $key => $value) {
                            $area_id = $area[$i]->id;
                            AreaPrice::create([
                                'product_id' => $item_id,
                                'area_id' => $area_id,
                                'price' => $key,
                            ]);

                            $i++;
                        }
                    }

                    $input['category_id'] = $category_id;
                    $input['brand_id'] = $brand_id;
                    $input['name'] = $line[2];
                    $input['imei_number'] = $line[3];
                    $input['warranty_date'] = $line[4];
                    $input['purchase_cost'] = $line[5];
                    $input['sell_cost'] = $line[6];
                    $input['alert_quantity'] = $line[7];

                    $data = new Product();
                    $data->fill($input)->save();

                }

                $i++;
            }
            fclose($file);


            $removefiles = glob(public_path() . '/assets/temp_files/*');

            // Deleting all the files in the list
            foreach ($removefiles as $file) {
                if (is_file($file))
                    unlink($file);
            }


            return back()->withSuccess(__('Bulk Product File Imported Successfully.'));
        } catch (\Throwable $th) {

            return back()->withError(__('Something is wrong!'));
        }
    }
}
