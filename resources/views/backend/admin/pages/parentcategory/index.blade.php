@extends('backend.admin.layouts.master')
@section('title')
    {{ __('Parent Categories') }}
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
                                            <h4 class="card-title">Parent Categories</h4>

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

                                        <table class="table table-striped table-bordered zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Actions</th>

                                                </tr>
                                            </thead>
                                            <tbody id="categoryTableBody">
                                                @foreach ($parentCategories as $item)
                                                    <tr>
                                                        <input type="hidden" class="delete_val"
                                                            value="{{ $item->id }}">
                                                        <td>{{ $item->id }}</td>
                                                        <td>{{ $item->name }}</td>
                                                        <td><a class="editBtn"><i class="ft-edit text-info"></i> </a> <a
                                                                class="" id="cancel-button"><i class="ft-trash text-danger"></i></a></td>
                                                    </tr>
                                                @endforeach
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
                                <h4 class="modal-title" id="myModalLabel1">Add Parent Category</h4>
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
    <script>
        $(document).ready(function() {
            let id = ''
            let lastModalType = ''; // Variable to store the last opened modal type
            // Event handler for edit button click
            $('.editBtn').on('click', function() {
                var row = $(this).closest('tr');
                id = row.find('td:eq(0)').text();
                var name = row.find('td:eq(1)').text();
                lastModalType = 'edit'; // Set the last opened modal type to 'edit'
                $('#myModalLabel1').text('Edit Parent Category');
                $('#id').val(id);
                $('#name').val(name);
                $('#default').modal('show');
            });

            // Event handler for opening the modal
            $('#default').on('show.bs.modal', function() {
                if (lastModalType === 'add') {
                    // Clear fields and set modal title for adding a new record
                    $('#myModalLabel1').text('Add Parent Category');
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
                    url: "{{ route('admin.parentcategory.store') }}",
                    type: 'POST',
                    data: $('#addParentCategoryForm').serialize(),
                    success: function(response) {
                        // Handle success response
                        console.log(response);
                        btn.removeClass('loading'); // Remove loading class from the button
                        $('#default').modal(
                            'hide'); // Hide the modal after successful submission
                        location.reload(); // Reload the window
                    },
                    error: function(xhr) {
                        // Handle error response
                        console.log(xhr.responseText);
                        btn.removeClass('loading'); // Remove loading class from the button
                    }
                });
            });

            

            //Delete Modal Working

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#cancel-button').click(function(e) {
                e.preventDefault();
                var delete_id = $(this).closest("tr").find('.delete_val').val();
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
                                    "{{ route('admin.parentcategory.destroy', 'item_id') }}",
                                    delete_id),
                                data: data,
                                success: function(response) {
                                    if (response.status) {
                                        swal(response.status, {
                                                icon: "success",
                                            })
                                            .then((result) => {
                                                location.reload();
                                            });
                                    } else {
                                        swal(response.error, {
                                                icon: "error",
                                            })
                                            .then((result) => {
                                                location.reload();
                                            });
                                    }
                                }

                            });


                        }
                    });


            });
        });
    </script>
@endsection
