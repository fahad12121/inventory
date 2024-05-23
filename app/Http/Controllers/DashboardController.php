<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [];
        $role_id = Auth::user()->role_id;
        if ($role_id == 6) {
            // Get all customers for the authenticated sales user
            $customers = Auth::user()->customers;

            // Calculate counts
            $totalCustomers = $customers->count();
            $activeCustomers = $customers->where('is_active', 1)->count();
            $deactiveCustomers = $customers->where('is_active', 0)->count();

            // Get all orders for the customers of the authenticated sales user
            $customerIds = $customers->pluck('id');
            $orders = Order::with('statuses')->whereIn('customer_id', $customerIds)->get();

            // Create an associative array to pass to the view
            $data = [
                'totalCustomers' => $totalCustomers,
                'activeCustomers' => $activeCustomers,
                'deactiveCustomers' => $deactiveCustomers,
                'orders' => $orders,
            ];
        }


        // return view('users.index', compact('customers'));

        return view('backend.admin.pages.dashboard.index', compact('data', 'role_id'));
    }
}
