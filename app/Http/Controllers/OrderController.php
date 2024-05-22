<?php

namespace App\Http\Controllers;

use App\Models\{Order, Service, User, OrderStatus, TechnicianStatus, OrderDeliveryImg};
use Illuminate\Http\Request;
use Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role_id =  Auth::user()->role_id;
        if ($role_id == 2) {
            $orders = Order::with('customer', 'statuses', 'employee', 'Techstatuses')->orderBy('id', 'desc')->get();
        } elseif ($role_id == 3) {
            $orders = Order::with('customer', 'statuses', 'employee', 'Techstatuses')->where('customer_id', Auth::id())->orderBy('id', 'desc')->get();
        } elseif ($role_id == 4) {
            $orders = Order::with('customer', 'statuses', 'employee', 'Techstatuses')->where('technician_id', Auth::id())->orderBy('id', 'desc')->get();
        } elseif ($role_id == 6) {
            $customerIds = Auth::user()->customers->pluck('id');
            $orders = Order::with('customer', 'statuses', 'employee', 'Techstatuses')->whereIn('customer_id', $customerIds)->orderBy('id', 'desc')->get();
        }

        return response()->json([
            "data" => $orders
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
            // Store the data in the database
            $order = new Order();
            $order->customer_id = Auth::id();
            $order->service_id = $request->service_id;
            $order->vehicles = $request->vehicles;
            $order->location = $request->location;
            $order->date = $request->date;
            $order->note = $request->note;
            $order->order_type = $request->order_type;

            // Handle image upload
            if ($request->hasFile('file')) {
                $order->file = $order->uploadImg($request->file('file'));
            }
            $order->save();

            // Return a response if needed
            return response()->json(['message' => 'Order Created successfully'], 200);
        } catch (\Illuminate\Database\QueryException $ex) {
            // Return an error response
            return response()->json(['error' => $ex->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order, $id)
    {
        $order = Order::find($id);
        if ($order) {
            $order =  Order::with('customer', 'service', 'statuses', 'employee', 'Techstatuses', 'DeliveryImages')->where('id', $order->id)->first();
            return view('backend.admin.pages.order.show', compact('order'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }

    public function fetchOrder()
    {
        $services = Service::all();
        $users = User::where([
            ['role_id', '=', 4],
            ['is_active', '=', 1],
        ])->orderByDesc('id')->get();
        return view('backend.admin.pages.order.index', compact('services', 'users'));
    }

    public function assign_order(Request $request)
    {

        $order = Order::findOrFail($request->orderId);
        $data = $request->all();

        $data = [
            'technician_id' => $data['technicianId'],
        ];


        $order->update($data);

        return response()->json(['message' => 'Order Assigned successfully'], 200);
    }

    public function change_status(Request $request)
    {

        $order = OrderStatus::orderBy('created_at', 'desc')->where('order_id', $request->orderId)->first();

        // Debugging statements

        // Check if an order status exists for the given order_id
        if ($order) {
            // Check if the selected status is in the correct sequence
            $order_status = $order->status_id + 1;
            // dd($data['status_id'] > $order_status, $data['status_id'] == 4 , "increment: $order_status", "order_id: $order->status_id", "request_id:". $data['status_id']);
            if ($request->status > $order_status) {
                $mesg = '';

                if ($request->status === '3') {
                    $mesg = 'Please Prepare the order First';
                } elseif ($request->status === '4') {
                    $mesg = 'Please Change status of Out for delivery first';
                } elseif ($request->status === '5') {
                    $mesg = 'Please Change status of Installation first';
                } elseif ($request->status === '6') {
                    $mesg = 'Please Change status of Integration first';
                }

                return response()->json(['message' => $mesg, 'code' => 404]);
            }
        }

        $orderStatus = new OrderStatus();
        $orderStatus->order_id = $request->orderId;
        $orderStatus->status_id = $request->status;
        $orderStatus->save();

        return response()->json(['message' => 'Order Status Changed Successfully', 'code' => 200]);
    }

    public function tech_change_status(Request $request)
    {
        $orderStatus = new TechnicianStatus();
        $orderStatus->order_id = $request->orderId;
        $orderStatus->technician_id = $request->tech_id;
        $orderStatus->status_id = $request->status;
        $orderStatus->save();

        return response()->json(['message' => 'Techniciam Status Changed Successfully', 'code' => 200]);
    }

    public function deliveryImg(Request $request)
    {
        // Handle the uploaded images
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                // Store the image in the storage or database
                // For simplicity, let's assume you are storing the image in the database
                $image = new OrderDeliveryImg();
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('orders/deliveryImg', $filename);
                $image->order_id = $request->order_id;
                $image->technician_id = $request->technician_id;
                $image->file = $filename;
                $image->save();
            }
        }

        // Return a response
        return response()->json(['message' => 'Images uploaded successfully']);
    }
}
