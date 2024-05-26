<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\{Branch, Order, Brand, Category, Product, ProductItem, Service, User};
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
        } elseif ($role_id == 2) {

            $totalBrands = Brand::all()->count();
            $totalCategories = Category::all()->count();
            $totalProducts = Product::all()->count();
            $totalProductsItems = ProductItem::all()->count();
            $totalServices = Service::all()->count();
            $totalBranch = Branch::all()->count();
            $totalCustomers = User::where('role_id', 3)->get()->count();
            $totalActiveCustomers = User::where(['role_id' => 3, 'is_active' => 1])->get()->count();
            $totalDeactiveCustomers = User::where(['role_id' => 3, 'is_active' => 0])->get()->count();
            $totalEmployees = User::where('role_id', 4)->get()->count();
            $totalsalePersons = User::where('role_id', 6)->get()->count();
            $totalCallCenter = User::where('role_id', 8)->get()->count();
            $orders = Order::with('statuses')->get();

            $data = [
                'totalBrands' => $totalBrands,
                'totalCategories' => $totalCategories,
                'totalProducts' => $totalProducts,
                'totalProductsItems' => $totalProductsItems,
                'totalServices' => $totalServices,
                'totalBranch' => $totalBranch,
                'totalCustomers' => $totalCustomers,
                'totalEmployees' => $totalEmployees,
                'totalsalePersons' => $totalsalePersons,
                'totalCallCenter' => $totalCallCenter,
                'totalActiveCustomers' => $totalActiveCustomers,
                'totalDeactiveCustomers' => $totalDeactiveCustomers,
                'orders' => $orders
            ];
        }


        // return view('users.index', compact('customers'));

        return view('backend.admin.pages.dashboard.index', compact('data', 'role_id'));
    }
}
