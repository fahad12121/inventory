@extends('backend.admin.layouts.master')
@section('title')
    {{ __('Companies') }}
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
                                            <h4 class="card-title">Companies</h4>

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

                                        <table class="table table-striped table-bordered" id="companyTabel">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Address</th>
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
                                <h4 class="modal-title" id="myModalLabel1">Add Company</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="row g-3" id="addCompanyForm">
                                    @csrf
                                    <input type="hidden" name="id" id="id">


                                    <div class="col-md-4">
                                        <label for="name" class="form-label">Name</label> <span
                                            class="text-danger">*</span>
                                        <input type="text" class="form-control" name="name" id="name">
                                        <div id="nameError" class="text-danger"></div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="email" class="form-label">Email</label> <span
                                            class="text-danger">*</span>
                                        <input type="email" class="form-control" name="email" id="email">
                                        <div id="emailError" class="text-danger"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" name="phone" id="phone">
                                    </div>
                                    <div class="col-md-4 mt-2">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" class="form-control" name="address" id="address">
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
@section('scripts')
    <script>
        const editMember = (item) => {
            $('#myModalLabel1').text('Edit Company');
            $('#id').val(item.id);
            $('#name').val(item.name);
            $('#email').val(item.email);
            $('#phone').val(item.phone);
            $('#address').val(item.address);

            // Show modal
            $('#default').modal('show');

        }

        const addModal = () => {
            $('#myModalLabel1').text('Add Company');
            $('#id').val('');
            $('#name').val('');
            $('#email').val('');
            $('#phone').val('');
            $('#address').val('');

        }

        $(document).ready(function() {

            // Function to fetch brands data via AJAX and populate DataTable
            var table = $('#companyTabel').DataTable({
                ajax: "{{ route('admin.company.index') }}",
                columns: [{
                        "data": "id"
                    },
                    {
                        "data": "name"
                    },
                    {
                        "data": "email"
                    },
                    {
                        "data": "phone"
                    },
                    {
                        "data": "address"
                    },
                    {
                        "data": {},
                        render: function(data, row, type) {
                            return `<a class="edit" data-id="${row.id}" ><i class="ft-edit text-info"></i></a> 
                            <a class="" id="cancel-button" data-id="${row.id}"><i class="ft-trash text-danger"></i></a>`;
                        }
                    }

                ]
            });

            let id = ''
            let lastModalType = ''; // Variable to store the last opened modal type

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

                var category_id = $('#name').val();
                var brand_id = $('#email').val();
                var name = $('#phone').val();
                var imei_number = $('#address').val();

                $.ajax({
                    url: "{{ route('admin.company.store') }}",
                    type: 'POST',
                    data: $('#addCompanyForm').serialize(),
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
                                    "{{ route('admin.company.destroy', 'item_id') }}",
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
