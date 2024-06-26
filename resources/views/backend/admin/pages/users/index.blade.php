@extends('backend.admin.layouts.master')
@section('title')
    {{ __('Users') }}
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
                                            <h4 class="card-title">Users</h4>

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

                                        <table class="table table-striped table-bordered" id="userTabel">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Phone</th>
                                                    <th>Role</th>
                                                    <th>Status</th>
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
                                <h4 class="modal-title" id="myModalLabel1">Add User</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="row g-3" id="addUserForm">
                                    @csrf
                                    <input type="hidden" name="id" id="id">

                                    <div class="col-md-4">
                                        <label for="name" class="form-label">Name</label> <span
                                            class="text-danger">*</span>
                                        <input type="text" class="form-control" name="name" id="name">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="email" class="form-label">Email</label> <span
                                            class="text-danger">*</span>
                                        <input type="email" class="form-control" name="email" id="email">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="number" min="0" class="form-control" name="phone"
                                            id="phone">
                                    </div>
                                    <div class="col-md-4 mt-2">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" class="form-control" name="address" id="address">
                                    </div>
                                    <div class="col-md-4 mt-2">
                                        <label for="city" class="form-label">City</label> <span
                                            class="text-danger">*</span>
                                        <input type="text" class="form-control" name="city" id="city">
                                    </div>
                                    <div class="col-md-4 mt-2">
                                        <label for="role_id" class="form-label">Select Role</label> <span
                                            class="text-danger">*</span>
                                        <select name="role_id" id="role_id" class="form-control form-seclect">
                                            <option value="" selected disabled>--Select--</option>
                                            @foreach ($roles as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 mt-2">
                                        <label for="password" class="form-label">Password</label> <span
                                            class="text-danger">*</span>
                                        <input type="password" name="password" id="password" class="form-control">
                                    </div>
                                    <div class="col-md-8"></div>
                                    <div class="col-md-4 mt-2">
                                        <label for="is_active" class="form-label">Active</label> <span
                                            class="text-danger">*</span> <br>
                                        <input class="" type="hidden" name="is_active" value="0">
                                        <!-- Hidden input with value 0 -->
                                        <input class="" type="checkbox" name="is_active" id="is_active"
                                            value="1" checked>
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
            $('#myModalLabel1').text('Edit User');
            $('#id').val(item.id);
            $('#name').val(item.name);
            $('#email').val(item.email);
            $('#phone').val(item.phone);
            $('#address').val(item.address);
            $('#city').val(item.city);
            $('#role_id').val(item.role_id);
            // Check the checkbox if is_active is 1, otherwise uncheck it
            if (item.is_active == 1) {
                $('#is_active').prop('checked', true);
            } else {
                $('#is_active').prop('checked', false);
            }
            // Show modal
            $('#default').modal('show');

        }

        const addModal = () => {
            $('#myModalLabel1').text('Add User');
            $('#id').val('');
            $('#name').val('');
            $('#email').val('');
            $('#phone').val('');
            $('#address').val('');
            $('#city').val('');
            $('#role_id').val('');
            $('#password').val('');
        }

        $(document).ready(function() {

            // // Function to fetch brands data via AJAX and populate DataTable
            var table = $('#userTabel').DataTable({
                ajax: "{{ route('admin.user.index') }}",
                columns: [{
                        "data": "id"
                    },
                    {
                        "data": "name"
                    },
                    {
                        "data": "phone"
                    },
                    {
                        "data": null,
                        "render": function(data, type, row) {
                            var badgeClass = row?.role?.name ? 'info' : 'info';
                            var statusText = row?.role?.name;
                            return `<span class="badge rounded-pill bg-${badgeClass}">${statusText}</span>`;
                        }
                    },
                    {
                        "data": null,
                        "render": function(data, type, row) {
                            var badgeClass = row.is_active ? 'success' : 'danger';
                            var statusText = row.is_active ? 'Active' : 'Deactive';
                            return `<span class="badge rounded-pill bg-${badgeClass}">${statusText}</span>`;
                        }
                    },
                    {
                        "data": {},
                        render: function(data, row, type) {
                            return `<a class="edit" data-id="${row.id}" ><i class="ft-edit text-info"></i></a> <a
                             class="" id="cancel-button" data-id="${row.id}"><i class="ft-trash text-danger"></i></a>`;
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

                $.ajax({
                    url: "{{ route('admin.user.store') }}",
                    type: 'POST',
                    data: $('#addUserForm').serialize(),
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
                                    "{{ route('admin.user.destroy', 'item_id') }}",
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
