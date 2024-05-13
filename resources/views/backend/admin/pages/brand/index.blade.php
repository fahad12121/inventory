@extends('backend.admin.layouts.master')
@section('title')
    {{ __('Brands') }}
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
                                        <div class="col-md-10">
                                            <h4 class="card-title">Brands</h4>

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

                                        <table class="table table-striped table-bordered " id="brandsTable">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
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
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel1">Add Brand</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="addParentCategoryForm">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="hidden" name="id" id="id">
                                                <input type="text" id="name" class="form-control" placeholder="Name"
                                                    name="name" required autofocus>
                                                <div id="nameError" class="text-danger"></div>
                                            </div>
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
            </div>
        </div>
    </div>

@section('scripts')
    <script src="{{ asset('app-assets/js/scripts/tables/datatables/datatable-basic.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {


            // Function to fetch brands data via AJAX and populate DataTable
            var table = $('#brandsTable').DataTable({
                ajax: "{{ route('admin.brand.index') }}",
                columns: [{
                        "data": "id"
                    },
                    {
                        "data": "name"
                    },
                    {
                        "data": null,
                        render: function(data, row, type) {
                            return `<a class="editBtn" data-id="${row.id}"><i class="ft-edit text-info"></i> </a> <a
                             class="" id="cancel-button" data-id="${row.id}"><i class="ft-trash text-danger"></i></a>`
                        }
                    }

                ]
            });

            let id = ''
            let lastModalType = ''; // Variable to store the last opened modal type
            // edit city code goes here
            $(document).on('click', '.editBtn', function() {
                var row = $(this).closest('tr');
                id = row.find('td:eq(0)').text();
                var name = row.find('td:eq(1)').text();
                lastModalType = 'edit'; // Set the last opened modal type to 'edit'
                $('#myModalLabel1').text('Edit Brand');
                $('#id').val(id);
                $('#name').val(name);
                $('#default').modal('show');
            })



            // Event handler for opening the modal
            $('#default').on('show.bs.modal', function() {
                if (lastModalType === 'add') {
                    // Clear fields and set modal title for adding a new record
                    $('#myModalLabel1').text('Add Brand');
                    $('#id').val('');
                    $('#name').val('');
                    $('#nameError').text('');
                }
            });
            // Event handler for closing the modal
            $('#default').on('hidden.bs.modal', function() {
                lastModalType = ''; // Reset the last opened modal type
            });

            // Event handler for opening the add modal
            $('#addBtn').on('click', function() {
                lastModalType = 'add'; // Set the last opened modal type to 'add'
                $('#default').modal('show');
            });

            // Event handler for form submission
            $('#submitForm').on('click', function() {
                var nameInput = $('#name');
                var name = nameInput.val();
                var nameError = $('#nameError');

                // Clear previous error messages
                nameError.text('');

                if (!name) {
                    nameError.text('Name field is required.');
                    return;
                }

                var btn = $(this);
                btn.addClass('loading'); // Add loading class to the button

                $.ajax({
                    url: "{{ route('admin.brand.store') }}",
                    type: 'POST',
                    data: $('#addParentCategoryForm').serialize(),
                    success: function(response) {
                        // Handle success response
                        console.log(response);
                        btn.removeClass('loading'); // Remove loading class from the button
                        table.ajax.reload();

                        $('#default').modal(
                            'hide'); // Hide the modal after successful submission
                        // Refresh the content of the tbody element

                    },
                    error: function(xhr) {
                        // Handle error response
                        console.log(xhr.responseText);
                        btn.removeClass('loading'); // Remove loading class from the button
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
                                    "{{ route('admin.brand.destroy', 'item_id') }}",
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
