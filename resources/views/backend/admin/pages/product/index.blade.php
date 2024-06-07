@extends('backend.admin.layouts.master')
@section('title')
    {{ __('Products') }}
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
                                            <h4 class="card-title">Products</h4>

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
                                                data-toggle="modal" data-target="#default" onclick="addModal()">
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
                                        <label for="category_id" class="form-label">Select Category</label> <span
                                            class="text-danger">*</span>
                                        <select name="category_id" id="category_id" title="--Select--" class="selectpicker" data-live-search="true">
                                            @foreach ($categories as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <div id="catError" class="text-danger"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="brand_id" class="form-label">Select Brand</label> <span
                                            class="text-danger">*</span>
                                        <select name="brand_id" id="brand_id" title="--Select--" class="selectpicker" data-live-search="true">
                                            <option value="" selected disabled>--Select--</option>
                                            @foreach ($brands as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <div id="brandError" class="text-danger"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="name" class="form-label">Name</label> <span
                                            class="text-danger">*</span>
                                        <input type="text" class="form-control" name="name" id="name">
                                        <div id="nameError" class="text-danger"></div>
                                    </div>
                                    <div class="col-md-4 mt-2">
                                        <label for="name" class="form-label">Warranty Date</label> <span
                                            class="text-danger">*</span>
                                        <input type="date" class="form-control" name="warranty_date" id="warranty_date">
                                        <div id="warranty_dateError" class="text-danger"></div>
                                    </div>
                                    <div class="col-md-4 mt-2">
                                        <label for="name" class="form-label">Purchase Cost</label>
                                        <input type="text" class="form-control" name="purchase_cost"
                                            id="purchase_cost">
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
    <script>
        const editMember = (item) => {
            $('#myModalLabel1').text('Edit Product');
            $('#id').val(item.id);
            $('#brand_id').val(item.brand_id);
            $('#category_id').val(item.category_id);
            $('#name').val(item.name);
            $('#warranty_date').val(item.warranty_date);
            $('#purchase_cost').val(item.purchase_cost);
            $('#sell_cost').val(item.sell_cost);
            $('#alert_quantity').val(item.alert_quantity);

            // Show modal
            $('#default').modal('show');

        }

        const addModal = () => {
            $('#myModalLabel1').text('Add Product');
            $('#id').val('');
            $('#category_id').val('');
            $('#brand_id').val('');
            $('#name').val('');
            $('#warranty_date').val('');
            $('#purchase_cost').val('');
            $('#sell_cost').val('');
            $('#alert_quantity').val('');

        }

        $(document).ready(function() {

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
                    url: "{{ route('admin.product.import') }}", // Replace 'your.route.name' with the actual route name
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

            // Function to fetch brands data via AJAX and populate DataTable
            var table = $('#productTabel').DataTable({
                ajax: "{{ route('admin.product.index') }}",
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
                            return `<p>${row.brand && row.brand.name ? row.brand.name : 'N/A'}</p>`;
                        }
                    },
                    {
                        "data": "name"
                    },
                    {
                        "data": "warranty_date"
                    },
                    {
                        "data": {},
                        render: function(data, row, type) {
                            var routeUrl = "{{ route('admin.product.listitems', ':id') }}";
                            routeUrl = routeUrl.replace(':id', data.id);
                            return `<a class="edit" data-id="${row.id}" title="Edit"><i class="ft-edit text-info"></i></a> 
                            <a class="" id="cancel-button" data-id="${row.id}" title="Delete"><i class="ft-trash text-danger"></i></a>
                            <a href="${routeUrl}"  class="listItems" id="listItems" data-id="${row.id}" title="List Items"><i class="ft-list text-secondary"></i></a>`;
                        }
                    }

                ]
            });

            $(document).on('click', '.edit', function() {

                var row = $(this).closest('tr');
                var data = table.row(row).data(); // Assuming you're using DataTables
                editMember(data);
            })



            //Submit Data Modal
            $('#submitForm').on('click', function() {
                var btn = $(this); // Cache the button element

                // Disable the button to prevent multiple submissions
                btn.prop('disabled', true);

                var category_id = $('#category_id').val();
                var brand_id = $('#brand_id').val();
                var name = $('#name').val();
                var warranty_date = $('#warranty_date').val();
                var purchase_cost = $('#purchase_cost').val();
                var sell_cost = $('#sell_cost').val();
                var alert_quantity = $('#alert_quantity').val();

                $.ajax({
                    url: "{{ route('admin.product.store') }}",
                    type: 'POST',
                    data: $('#addProductForm').serialize(),
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
                                    "{{ route('admin.product.destroy', 'item_id') }}",
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
