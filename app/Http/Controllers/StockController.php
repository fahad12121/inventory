<?php

namespace App\Http\Controllers;

use App\Models\{Stock, SedRec, Branch};
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
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
}
