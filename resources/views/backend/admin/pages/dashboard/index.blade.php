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
                @if ($role_id == 6)
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
                @endif

            </div>
        </div>
    </div>
@endsection
