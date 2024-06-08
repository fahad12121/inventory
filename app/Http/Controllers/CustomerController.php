<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Imports\UserImport;
use Maatwebsite\Excel\Facades\Excel;

class CustomerController extends Controller
{
    public function index()
    {
        // Get all customers for the authenticated sales user
        $customers = Auth::user()->customers;
        // return view('users.index', compact('customers'));

        return response()->json([
            "data" => $customers
        ]);
    }

    public function fetchCustomer()
    {
        return view('backend.admin.pages.customer.index');
    }

    public function store(Request $request)
    {
        try {
            $id = $request->id;
            if ($id) {
                $user = User::find($id);
                $user->name = $request->name;
                $user->email = $request->email;
                if ($request->password) {
                    $user->password = Hash::make($request->password);
                }
                $user->phone = $request->phone;
                $user->address = $request->address;
                $user->city = $request->city;
                $user->role_id = 3;
                $user->user_id = Auth::user()->id;
                $user->is_active = $request->is_active;
                $user->save();
                if ($user) {
                    // Return a response if needed
                    return response()->json(['message' => 'User Updated successfully'], 200);
                }
            } else {
                // Store the data in the database
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->phone = $request->phone;
                $user->address = $request->address;
                $user->city = $request->city;
                $user->role_id = 3;
                $user->user_id = Auth::user()->id;
                $user->is_active = $request->is_active;
                $user->save();

                // Return a response if needed
                return response()->json(['message' => 'User stored successfully'], 200);
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            // Return an error response
            return response()->json(['error' => $ex->getMessage()], 500);
        }
    }
    //*** POST Request
    public function import(Request $request)
    {
        set_time_limit(300);
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|mimes:csv,txt',
        ]);

        // Import the file
        Excel::import(new UserImport, $request->file('file'));
        // Return a response if needed
        return response()->json(['message' => 'User Imported successfully'], 200);
    }
}
