@extends('backend.admin.layouts.master')
@section('title')
    {{ __('Products - List Items') }}
@endsection

@section('content')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
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
                                        <div class="col-md-12">
                                            <h4 class="card-title">({{ $product->name ? $product->name : 'N/A' }}) Items
                                                List
                                            </h4>

                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Select Date Range</label>
                                                <div class='input-group'>
                                                    <input type='text' name="datefilter" id="datefilter" class="form-control" />
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <span class="la la-calendar"></span>
                                                        </span>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-md-2" style="margin-top: 28px;">
                                            <div class="form-group">

                                                <a  id="searchBtn" class="btn btn-outline-primary block" download>
                                                    Search
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-2" style="margin-top: 28px;">
                                            <div class="form-group">
                                                <a href="{{ route('admin.product.download') }}"
                                                    class="btn btn-outline-info block" download>
                                                    Exp CSV
                                                </a>
                                            </div>

                                        </div>
                                        <div class="col-md-2" style="margin-top: 28px;">
                                            <div class="form-group">
                                                <button type="button" id="addBtn" class="btn btn-outline-success block"
                                                    data-toggle="modal" data-target="#csvModal">
                                                    Import CSV
                                                </button>
                                            </div>

                                        </div>
                                        <div class="col-md-2" style="margin-top: 28px;">
                                            <div class="form-group">
                                                <button type="button" id="addBtn" class="btn btn-outline-primary block"
                                                    data-toggle="modal" data-target="#default" onclick="addModal()">
                                                    +Add
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">

                                        <table class="table table-striped table-bordered" id="productItemTabel">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Category</th>
                                                    <th>Product</th>
                                                    <th>Item No</th>
                                                    <th>Serial No</th>
                                                    <th>Created At</th>
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
                                <h4 class="modal-title" id="myModalLabel1">Add Product Item</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="" id="addProductItemForm">
                                    @csrf
                                    <input type="hidden" name="id" id="id">
                                    <input type="hidden" name="category_id" id="category_id"
                                        value="{{ $product->category_id }}">
                                    <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="category_id" class="form-label">Category</label> <span
                                                class="text-danger">*</span>
                                            <input type="text"
                                                value="{{ $product->category ? $product->category->name : 'N/A' }}" readonly
                                                class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="product_id" class="form-label">Product</label> <span
                                                class="text-danger">*</span>
                                            <input type="text" value="{{ $product->name ? $product->name : 'N/A' }}"
                                                readonly class="form-control">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mt-2">
                                            <label for="item_no" class="form-label">Item No</label> <span
                                                class="text-danger">*</span>
                                            <input type="text" class="form-control" name="item_no" id="item_no">
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <label for="serial_no" class="form-label">Serial No</label> <span
                                                class="text-danger">*</span>
                                            <input type="text" class="form-control" name="serial_no" id="serial_no">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">

                                <button type="button" id="submitForm" class="btn btn-outline-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CSV -->
                <div class="modal fade text-left" id="csvModal" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel1">Add Product</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="row g-3" id="addcsvForm">
                                    @csrf
                                    <div class="col-md-12">
                                        <label for="file" class="form-label">Import CSV</label> <span
                                            class="text-danger">*</span>
                                        <input type="file" class="form-control" name="file" id="file"
                                            accept=".csv,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">

                                <button type="button" id="submitCsv" class="btn btn-outline-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
        $(function() {

            $('input[name="datefilter"]').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear'
                }
            });

            $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format(
                    'MM/DD/YYYY'));
            });

            $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });

        });

        const editMember = (item) => {
            $('#myModalLabel1').text('Edit Product Item');
            $('#id').val(item.id);
            $('#category_id').val(item.category_id);
            $('#product_id').val(item.product_id);
            $('#item_no').val(item.item_no);
            $('#serial_no').val(item.serial_no);

            // Show modal
            $('#default').modal('show');

        }

        const addModal = () => {
            $('#myModalLabel1').text('Add Product Item');
            $('#id').val('');
            $('#category_id').val('');
            $('#product_id').val('');
            $('#item_no').val('');
            $('#serial_no').val('');

        }

        $(document).ready(function() {

            // Function to fetch brands data via AJAX and populate DataTable
            var table = $('#productItemTabel').DataTable({
                ajax: {
                    url: "{{ route('admin.productItem.index', $product->id) }}",
                    data: function(d) {
                        var dateRange = $('#datefilter').val();
                        if (dateRange) {
                            var dates = dateRange.split(' - ');
                            d.startDate = dates[0];
                            d.endDate = dates[1];
                        }
                    }
                },
                columns: [{
                        "data": "id"
                    },
                    {
                        "data": null,
                        "render": function(data, type, row) {
                            return `<p>${row.category && row.category.name ? row.category.name : 'N/A'}</p>`;
                        }
                    },
                    {
                        "data": null,
                        "render": function(data, type, row) {
                            return `<p>${row.product && row.product.name ? row.product.name : 'N/A'}</p>`;
                        }
                    },
                    {
                        "data": "item_no"
                    },
                    {
                        "data": "serial_no"
                    },
                    {
                        "data": null,
                        render: function(data, row, type) {
                            return `<p>${convertDate(data.created_at)}</p>`;
                        }
                    },
                    {
                        "data": {},
                        render: function(data, row, type) {
                            return `<a class="edit" data-id="${row.id}" title="Edit"><i class="ft-edit text-info"></i></a> 
                            <a class="" id="cancel-button" data-id="${row.id}" title="Delete"><i class="ft-trash text-danger"></i></a>`;
                        }
                    }

                ]
            });
            // Event handler for search button
            $('#searchBtn').on('click', function() {
                table.ajax.reload();
            });

            $(document).on('click', '.edit', function() {

                var row = $(this).closest('tr');
                var data = table.row(row).data(); // Assuming you're using DataTables
                editMember(data);
            })

            //upload csv
            // Event handler for form submission
            $('#submitCsv').on('click', function() {
                var formData = new FormData();

                var file = $('#file')[0].files[0]; // Get the first file selected in the input element

                if (file !== undefined) {
                    formData.append('file', file);

                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('admin.productItem.import') }}", // Replace 'your.route.name' with the actual route name
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Handle success response
                        toastr.success(response.message);
                        table.ajax.reload();
                        $('#csvModal').modal(
                            'hide'); // Hide the modal after successful submission

                    },
                    error: function(xhr) {
                        // Handle error response
                        console.log(xhr.responseText);
                    }
                });
            });

            //Submit Data Modal
            $('#submitForm').on('click', function() {
                var btn = $(this); // Cache the button element

                // Disable the button to prevent multiple submissions
                btn.prop('disabled', true);

                var category_id = "{{ $product->category_id }}";
                var product_id = "{{ $product->id }}";
                var item_no = $('#item_no').val();
                var serial_no = $('#serial_no').val();

                var data = {
                    "_token": "{{ csrf_token() }}",
                    "id": $('#id').val(),
                    "category_id": "{{ $product->category_id }}",
                    "product_id": "{{ $product->id }}",
                    "item_no": $('#item_no').val(),
                    "serial_no": $('#serial_no').val(),

                };

                $.ajax({
                    url: "{{ route('admin.productItem.store') }}",
                    type: 'POST',
                    data: data,
                    success: function(response) {
                        // Handle success response
                        toastr.success(response.message);
                        table.ajax.reload();

                        // Hide the modal after successful submission
                        $('#default').modal('hide');
                    },
                    error: function(xhr) {
                        // Handle error response
                        console.log(xhr.responseText);
                    },
                    complete: function() {
                        // Re-enable the button after the AJAX request is complete
                        btn.prop('disabled', false);
                    }
                });
            });

            //Delete Modal Working
            $(document).on('click', '#cancel-button', function() {
                var row = $(this).closest('tr');
                var delete_id = row.find('td:eq(0)').text();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this data!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {

                            var data = {
                                "_token": "{{ csrf_token() }}",
                                "id": delete_id,
                            };

                            $.ajax({
                                type: "DELETE",
                                url: get_url(
                                    "{{ route('admin.productItem.destroy', 'item_id') }}",
                                    delete_id),
                                data: data,
                                success: function(response) {
                                    if (response.status) {
                                        swal(response.status, {
                                                icon: "success",
                                            })
                                            .then((result) => {
                                                table.ajax.reload();
                                            });
                                    } else {
                                        swal(response.error, {
                                                icon: "error",
                                            })
                                            .then((result) => {
                                                table.ajax.reload();
                                            });
                                    }
                                }

                            });


                        }
                    });

            })
        });
    </script>
@endsection
