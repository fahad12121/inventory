@extends('backend.admin.layouts.master')
@section('title')
    {{ __('Dashboard') }}
@endsection
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                @if ($role_name === 'Sales')
                    <!-- Minimal statistics with gradient bg color section start -->
                    <section id="minimal-gradient-statistics-bg">
                        <div class="row">
                            <div class="col-12 mt-3 mb-1">
                                <h4 class="text-uppercase">Sales Dashboard</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-4 col-lg-6 col-12">
                                <div class="card bg-gradient-directional-info">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    <i class="icon-users text-white font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body text-white text-right">
                                                    <h3 class="text-white">{{ $data['totalCustomers'] }}</h3>
                                                    <span>Customers</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-12">
                                <div class="card bg-gradient-directional-success">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    <i class="icon-users text-white font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body text-white text-right">
                                                    <h3 class="text-white">{{ $data['activeCustomers'] }}</h3>
                                                    <span>Active Customers</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-12">
                                <div class="card bg-gradient-directional-danger">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    <i class="icon-users text-white font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body text-white text-right">
                                                    <h3 class="text-white">{{ $data['deactiveCustomers'] }}</h3>
                                                    <span>Deactive Customers</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-12">
                                <div class="card bg-gradient-directional-info">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    <i class="icon-basket-loaded text-white font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body text-white text-right">
                                                    <h3 class="text-white">{{ $data['orders']->count() }}</h3>
                                                    <span>Total Orders</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @php
                                $start = 0;
                                $preparing = 0;
                                $delivery = 0;
                                $installation = 0;
                                $integration = 0;
                                $close = 0;

                                foreach ($data['orders'] as $order) {
                                    if ($order->statuses->contains('status_id', 1)) {
                                        $start++;
                                    }
                                    if ($order->statuses->contains('status_id', 2)) {
                                        $preparing++;
                                    }
                                    if ($order->statuses->contains('status_id', 3)) {
                                        $delivery++;
                                    }
                                    if ($order->statuses->contains('status_id', 4)) {
                                        $installation++;
                                    }
                                    if ($order->statuses->contains('status_id', 5)) {
                                        $integration++;
                                    }
                                    if ($order->statuses->contains('status_id', 6)) {
                                        $close++;
                                    }
                                }
                            @endphp
                            <div class="col-xl-4 col-lg-6 col-12">
                                <div class="card bg-gradient-directional-success">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    <i class="icon-basket-loaded text-white font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body text-white text-right">
                                                    <h3 class="text-white">{{ $start }}</h3>
                                                    <span>Start Orders</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-12">
                                <div class="card bg-gradient-directional-primary">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    <i class="icon-basket-loaded text-white font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body text-white text-right">
                                                    <h3 class="text-white">{{ $preparing }}</h3>
                                                    <span>Preparing Orders</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-12">
                                <div class="card bg-gradient-directional-warning">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    <i class="icon-basket-loaded text-white font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body text-white text-right">
                                                    <h3 class="text-white">{{ $delivery }}</h3>
                                                    <span>Delivery Orders</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-12">
                                <div class="card bg-gradient-directional-success">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    <i class="icon-basket-loaded text-white font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body text-white text-right">
                                                    <h3 class="text-white">{{ $installation }}</h3>
                                                    <span>Installation Orders</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-12">
                                <div class="card bg-gradient-directional-info">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    <i class="icon-basket-loaded text-white font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body text-white text-right">
                                                    <h3 class="text-white">{{ $integration }}</h3>
                                                    <span>Integration Orders</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-12">
                                <div class="card bg-gradient-directional-danger">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    <i class="icon-basket-loaded text-white font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body text-white text-right">
                                                    <h3 class="text-white">{{ $close }}</h3>
                                                    <span>Close Orders</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </section>
                    <!-- // Minimal statistics with bg gradient color section end -->
                @elseif($role_name === 'Admin')
                    <section id="minimal-gradient-statistics-bg">
                        <div class="row">
                            <div class="col-12 mt-3 mb-1">
                                <h4 class="text-uppercase">Admin Dashboard</h4>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-xl-3 col-lg-6 col-12">
                                <div class="card bg-gradient-directional-success">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    <i class="la la-tablet text-white font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body text-white text-right">
                                                    <h3 class="text-white">{{ $data['totalCategories'] }}</h3>
                                                    <span>Categories</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12">
                                <div class="card bg-gradient-directional-warning">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    <i class="la la-list text-white font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body text-white text-right">
                                                    <h3 class="text-white">{{ $data['totalProducts'] }}</h3>
                                                    <span>Products</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12">
                                <div class="card bg-gradient-directional-warning">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    <i class="la la-list text-white font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body text-white text-right">
                                                    <h3 class="text-white">{{ $data['totalProductsItems'] }}</h3>
                                                    <span>Product Items</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12">
                                <div class="card bg-gradient-directional-primary">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    <i class="la la-tablet text-white font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body text-white text-right">
                                                    <h3 class="text-white">{{ $data['totalServices'] }}</h3>
                                                    <span>Services</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12">
                                <div class="card bg-gradient-directional-info">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    <i class="la la-users text-white font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body text-white text-right">
                                                    <h3 class="text-white">{{ $data['totalCustomers'] }}</h3>
                                                    <span>Customers</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12">
                                <div class="card bg-gradient-directional-warning">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    <i class="la la-users text-white font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body text-white text-right">
                                                    <h3 class="text-white">{{ $data['totalEmployees'] }}</h3>
                                                    <span>Employees</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12">
                                <div class="card bg-gradient-directional-info">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    <i class="la la-users text-white font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body text-white text-right">
                                                    <h3 class="text-white">{{ $data['totalsalePersons'] }}</h3>
                                                    <span>Sales Persons</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12">
                                <div class="card bg-gradient-directional-success">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    <i class="la la-users text-white font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body text-white text-right">
                                                    <h3 class="text-white">{{ $data['totalActiveCustomers'] }}</h3>
                                                    <span>Active Customers</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12">
                                <div class="card bg-gradient-directional-danger">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    <i class="la la-users text-white font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body text-white text-right">
                                                    <h3 class="text-white">{{ $data['totalDeactiveCustomers'] }}</h3>
                                                    <span>Deative Customers</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-6 col-12">
                                <div class="card bg-gradient-directional-info">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    <i class="icon-basket-loaded text-white font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body text-white text-right">
                                                    <h3 class="text-white">{{ $data['orders']->count() }}</h3>
                                                    <span>Total Orders</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @php
                                $statusCounts = [
                                    1 => 0, // Start
                                    2 => 0, // Preparing
                                    3 => 0, // Delivery
                                    4 => 0, // Installation
                                    5 => 0, // Integration
                                    6 => 0, // Close
                                ];

                                foreach ($data['orders'] as $order) {
                                    if (isset($order->latestStatus)) {
                                        $statusCounts[$order->latestStatus->status_id]++;
                                    }
                                }
                            @endphp
                            <div class="col-xl-3 col-lg-6 col-12">
                                <div class="card bg-gradient-directional-success">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    <i class="icon-basket-loaded text-white font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body text-white text-right">
                                                    <h3 class="text-white">{{ $statusCounts[1] }}</h3>
                                                    <span>Start Orders</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12">
                                <div class="card bg-gradient-directional-primary">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    <i class="icon-basket-loaded text-white font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body text-white text-right">
                                                    <h3 class="text-white">{{ $statusCounts[2] }}</h3>
                                                    <span>Preparing Orders</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12">
                                <div class="card bg-gradient-directional-warning">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    <i class="icon-basket-loaded text-white font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body text-white text-right">
                                                    <h3 class="text-white">{{ $statusCounts[3] }}</h3>
                                                    <span>Delivery Orders</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12">
                                <div class="card bg-gradient-directional-success">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    <i class="icon-basket-loaded text-white font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body text-white text-right">
                                                    <h3 class="text-white">{{ $statusCounts[4] }}</h3>
                                                    <span>Installation Orders</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12">
                                <div class="card bg-gradient-directional-info">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    <i class="icon-basket-loaded text-white font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body text-white text-right">
                                                    <h3 class="text-white">{{ $statusCounts[5] }}</h3>
                                                    <span>Integration Orders</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12">
                                <div class="card bg-gradient-directional-danger">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    <i class="icon-basket-loaded text-white font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body text-white text-right">
                                                    <h3 class="text-white">{{ $statusCounts[6] }}</h3>
                                                    <span>Close Orders</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </section>
                @elseif($role_name === 'User')
                    <section id="minimal-gradient-statistics-bg">
                        <div class="row">
                            <div class="col-12 mt-3 mb-1">
                                <h4 class="text-uppercase">Customer Dashboard</h4>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-xl-3 col-lg-6 col-12">
                                <div class="card bg-gradient-directional-info">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    <i class="icon-basket-loaded text-white font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body text-white text-right">
                                                    <h3 class="text-white">{{ $data['orders']->count() }}</h3>
                                                    <span>Total Orders</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @php
                                $statusCounts = [
                                    1 => 0, // Start
                                    2 => 0, // Preparing
                                    3 => 0, // Delivery
                                    4 => 0, // Installation
                                    5 => 0, // Integration
                                    6 => 0, // Close
                                ];

                                foreach ($data['orders'] as $order) {
                                    if (isset($order->latestStatus)) {
                                        $statusCounts[$order->latestStatus->status_id]++;
                                    }
                                }
                            @endphp
                            <div class="col-xl-3 col-lg-6 col-12">
                                <div class="card bg-gradient-directional-success">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    <i class="icon-basket-loaded text-white font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body text-white text-right">
                                                    <h3 class="text-white">{{ $statusCounts[1] }}</h3>
                                                    <span>Start Orders</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12">
                                <div class="card bg-gradient-directional-primary">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    <i class="icon-basket-loaded text-white font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body text-white text-right">
                                                    <h3 class="text-white">{{ $statusCounts[2] }}</h3>
                                                    <span>Preparing Orders</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12">
                                <div class="card bg-gradient-directional-warning">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    <i class="icon-basket-loaded text-white font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body text-white text-right">
                                                    <h3 class="text-white">{{ $statusCounts[3] }}</h3>
                                                    <span>Delivery Orders</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12">
                                <div class="card bg-gradient-directional-success">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    <i class="icon-basket-loaded text-white font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body text-white text-right">
                                                    <h3 class="text-white">{{ $statusCounts[4] }}</h3>
                                                    <span>Installation Orders</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12">
                                <div class="card bg-gradient-directional-info">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    <i class="icon-basket-loaded text-white font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body text-white text-right">
                                                    <h3 class="text-white">{{ $statusCounts[5] }}</h3>
                                                    <span>Integration Orders</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12">
                                <div class="card bg-gradient-directional-danger">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    <i class="icon-basket-loaded text-white font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body text-white text-right">
                                                    <h3 class="text-white">{{ $statusCounts[6] }}</h3>
                                                    <span>Close Orders</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </section>
                @elseif($role_name === 'Operations')
                    <section id="minimal-gradient-statistics-bg">
                        <div class="row">
                            <div class="col-12 mt-3 mb-1">
                                <h4 class="text-uppercase">Operations Dashboard</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-lg-6 col-12">
                                <div class="card bg-gradient-directional-info">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    <i class="icon-basket-loaded text-white font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body text-white text-right">
                                                    <h3 class="text-white">{{ $data['orders']->count() }}</h3>
                                                    <span>Today Orders</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-6 col-12">
                                <div class="card bg-gradient-directional-info">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    <i class="icon-basket-loaded text-white font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body text-white text-right">
                                                    <h3 class="text-white">{{ $data['orders']->count() }}</h3>
                                                    <span>Total Orders</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @php
                                $statusCounts = [
                                    1 => 0, // Start
                                    2 => 0, // Preparing
                                    3 => 0, // Delivery
                                    4 => 0, // Installation
                                    5 => 0, // Integration
                                    6 => 0, // Close
                                ];

                                foreach ($data['orders'] as $order) {
                                    if (isset($order->latestStatus)) {
                                        $statusCounts[$order->latestStatus->status_id]++;
                                    }
                                }
                            @endphp
                            <div class="col-xl-3 col-lg-6 col-12">
                                <div class="card bg-gradient-directional-success">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    <i class="icon-basket-loaded text-white font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body text-white text-right">
                                                    <h3 class="text-white">{{ $statusCounts[1] }}</h3>
                                                    <span>Start Orders</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12">
                                <div class="card bg-gradient-directional-primary">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    <i class="icon-basket-loaded text-white font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body text-white text-right">
                                                    <h3 class="text-white">{{ $statusCounts[2] }}</h3>
                                                    <span>Preparing Orders</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12">
                                <div class="card bg-gradient-directional-warning">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    <i class="icon-basket-loaded text-white font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body text-white text-right">
                                                    <h3 class="text-white">{{ $statusCounts[3] }}</h3>
                                                    <span>Delivery Orders</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12">
                                <div class="card bg-gradient-directional-success">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    <i class="icon-basket-loaded text-white font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body text-white text-right">
                                                    <h3 class="text-white">{{ $statusCounts[4] }}</h3>
                                                    <span>Installation Orders</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12">
                                <div class="card bg-gradient-directional-info">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    <i class="icon-basket-loaded text-white font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body text-white text-right">
                                                    <h3 class="text-white">{{ $statusCounts[5] }}</h3>
                                                    <span>Integration Orders</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12">
                                <div class="card bg-gradient-directional-danger">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    <i class="icon-basket-loaded text-white font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body text-white text-right">
                                                    <h3 class="text-white">{{ $statusCounts[6] }}</h3>
                                                    <span>Close Orders</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </section>
                @elseif($role_name === 'Employee')
                <section id="minimal-gradient-statistics-bg">
                    <div class="row">
                        <div class="col-12 mt-3 mb-1">
                            <h4 class="text-uppercase">Employee Dashboard</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-12">
                            <div class="card bg-gradient-directional-info">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="align-self-center">
                                                <i class="icon-basket-loaded text-white font-large-2 float-left"></i>
                                            </div>
                                            <div class="media-body text-white text-right">
                                                <h3 class="text-white">{{ $data['orders']->count() }}</h3>
                                                <span>Today Orders</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-6 col-12">
                            <div class="card bg-gradient-directional-info">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="align-self-center">
                                                <i class="icon-basket-loaded text-white font-large-2 float-left"></i>
                                            </div>
                                            <div class="media-body text-white text-right">
                                                <h3 class="text-white">{{ $data['orders']->count() }}</h3>
                                                <span>Total Orders</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                        

                    </div>

                </section>
                @endif

            </div>
        </div>
    </div>
@endsection
