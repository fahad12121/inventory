<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\{Branch, Order, Brand, Category, Product, ProductItem, Service, User};
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [];
        $role_name =  Auth::user()->role ? Auth::user()->role->name : '';
        if ($role_name === 'Sales') {
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
        } elseif ($role_name === 'Admin') {

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
        } elseif ($role_name === 'User') {

            $orders = Order::with('statuses')->where('customer_id', Auth->user()->id)->get();
            // Create an associative array to pass to the view
            $data = [
                'orders' => $orders,
            ];
        } elseif ($role_name === 'Operations') {

            $orders = Order::with('statuses')->get();

            // Get today's orders count
            $todayOrdersCount = Order::with('statuses')
                ->whereDate('created_at', Carbon::today())
                ->count();
            // Create an associative array to pass to the view
            $data = [
                'orders' => $orders,
                'todayOrdersCount' => $todayOrdersCount,
            ];
        } elseif ($role_name === 'Employee') {

            $orders = Order::with('statuses')->where('technician_id', Auth->user()->id)->get();

            // Get today's orders count
            $todayOrdersCount = Order::with('statuses')->where('technician_id', Auth->user()->id)
                ->whereDate('created_at', Carbon::today())
                ->count();
            // Create an associative array to pass to the view
            $data = [
                'orders' => $orders,
                'todayOrdersCount' => $todayOrdersCount,
            ];
        }


        // return view('users.index', compact('customers'));

        return view('backend.admin.pages.dashboard.index', compact('data', 'role_name'));
    }
}
