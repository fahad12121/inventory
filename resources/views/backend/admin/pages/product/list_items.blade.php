@extends('backend.admin.layouts.master')
@section('title')
    {{ __('Products - List Items') }}
@endsection
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Zero configuration table -->
                <section id="configuration">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="card-title">({{ $product->name ? $product->name : 'N/A' }}) Items List
                                            </h4>

                                        </div>
                                        <div class="col-md-2">
                                            <a href="{{ route('admin.product.download') }}"
                                                class="btn btn-outline-info block" download>
                                                Example CSV
                                            </a>

                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" id="addBtn" class="btn btn-outline-success block"
                                                data-toggle="modal" data-target="#csvModal">
                                                Import CSV
                                            </button>

                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" id="addBtn" class="btn btn-outline-primary block"
                                                data-toggle="modal" data-target="#default">
                                                +Add
                                            </button>

                                        </div>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">

                                        <table class="table table-striped table-bordered" id="productTabel">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Category</th>
                                                    <th>Brand</th>
                                                    <th>Name</th>
                                                    <th>Warranty Date</th>
                                                    <th>Actions</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                <!-- Table rows will be dynamically added here -->
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Zero configuration table -->

                <!-- Modal -->
                <div class="modal fade text-left" id="default" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel1">Add Product</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="row g-3" id="addProductForm">
                                    @csrf
                                    <input type="hidden" name="id" id="id">

                                    <div class="col-md-4">
                                        <label for="name" class="form-label">Name</label> <span
                                            class="text-danger">*</span>
                                        <input type="text" class="form-control" name="name" id="name">
                                        <div id="nameError" class="text-danger"></div>
                                    </div>
                                    <div class="col-md-4 mt-2">
                                        <label for="name" class="form-label">IMEI Number</label> <span
                                            class="text-danger">*</span>
                                        <input type="text" class="form-control" name="imei_number" id="imei_number">
                                        <div id="imei_numberError" class="text-danger"></div>
                                    </div>
                                    <div class="col-md-4 mt-2">
                                        <label for="name" class="form-label">Warranty Date</label> <span
                                            class="text-danger">*</span>
                                        <input type="date" class="form-control" name="warranty_date" id="warranty_date">
                                        <div id="warranty_dateError" class="text-danger"></div>
                                    </div>
                                    <div class="col-md-4 mt-2">
                                        <label for="name" class="form-label">Purchase Cost</label>
                                        <input type="text" class="form-control" name="purchase_cost" id="purchase_cost">
                                    </div>
                                    <div class="col-md-4 mt-2">
                                        <label for="name" class="form-label">Sell Cost</label>
                                        <input type="text" class="form-control" name="sell_cost" id="sell_cost">
                                    </div>
                                    <div class="col-md-4 mt-2">
                                        <label for="name" class="form-label">Alert Quantity</label>
                                        <input type="text" class="form-control" name="alert_quantity"
                                            id="alert_quantity">
                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">

                                <button type="button" id="submitForm" class="btn btn-outline-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
