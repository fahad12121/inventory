<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::orderBy('id', 'desc')
            ->get();

        return response()->json([
            "data" => $companies
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
                $company = Company::find($id);
                $company->name = $request->name;
                $company->email = $request->email;
                $company->phone = $request->phone;
                $company->address = $request->address;
                $company->save();
                if ($company) {
                    // Return a response if needed
                    return response()->json(['message' => 'Company Updated successfully'], 200);
                }
            } else {
                // Store the data in the database
                $company = new Company();
                $company->name = $request->name;
                $company->email = $request->email;
                $company->phone = $request->phone;
                $company->address = $request->address;
                $company->save();

                // Return a response if needed
                return response()->json(['message' => 'Company stored successfully'], 200);
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            // Return an error response
            return response()->json(['error' => $ex->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company, Request $request)
    {
        $branch = Company::find($request->id);
        $branch->delete();
        return response()->json(['status' => 'Record Deleted Successfully']);
    }

    public function fetchCompany(Request $request)
    {
        return view('backend.admin.pages.company.index');
    }
}
