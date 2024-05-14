<?php

namespace App\Http\Controllers;

use App\Models\{Stock, SedRec, Branch, Product, ProductItem};
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productItems = ProductItem::with('branch', 'sender', 'receiver')->whereNotNull('branch_id')
            ->orderBy('id', 'desc')
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
        $data = $request->all();
        $items = ProductItem::whereIn('id', $data['items'])->get();

        if (count($items) > 0) {
            if (isset($data['employee_id'])) {
                $data = [
                    'employee_id' => $data['employee_id'],
                    'branch_id' => $data['branch_id'],
                    'is_employee_issued' => 1,
                    'employee_issued_at' => date('y-m-d h:i:s', strtotime($data['created_at'])),
                ];
            } else {
                $data = [
                    'sender_id' => $data['sender_id'],
                    'receiver_id' => $data['receiver_id'],
                    'branch_id' => $data['branch_id'],
                    'is_branch_issued' => 1,
                    'branch_issued_at' => date('y-m-d h:i:s', strtotime($data['created_at'])),
                ];
            }

            foreach ($items as $item) {
                $item->update($data);
            }
        }

        // Return a response if needed
        return response()->json(['message' => 'Stock Issued successfully'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stock $stock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stock $stock)
    {
        //
    }

    public function fetchStock(Request $request)
    {
        $sedRec = SedRec::orderBy('id', 'desc')->get();
        $branches = Branch::orderBy('id', 'desc')->get();

        return view('backend.admin.pages.stock.index', compact('sedRec', 'branches'));
    }

    public function searchProduct(Request $request)
    {
        $data = $request->all();
        $products = Product::orderBy('name', 'asc')
            ->where('name', 'like', '%' . $data['query'] . '%')
            ->get();

        return response()->json([
            "count" => count($products),
            "data" => $products,
        ]);
    }

    public function getProductItems(Request $request)
    {
        $data = $request->all();
        $is_issued = isset($data['employee_id']) ? 'is_employee_issued' : 'is_branch_issued';
        $warehouse = isset($data['employee_id']) ? $data['branch_id'] : null;
        $items = ProductItem::orderBy('id', 'asc')
            ->where('product_id', $data['query'])
            ->where('branch_id', $warehouse)
            ->where($is_issued, 0)
            ->get();

        return response()->json([
            "count" => count($items),
            "data" => $items,
        ]);
    }
}
