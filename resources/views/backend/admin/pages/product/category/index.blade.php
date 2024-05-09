@extends('backend.admin.layouts.master')
@section('title')
    {{ __('Categories') }}
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
                                            <h4 class="card-title">Categories</h4>

                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" id="addBtn" onclick="addModal()"
                                                class="btn btn-outline-primary block" data-toggle="modal"
                                                data-target="#default">
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
                                                    <th>Parent Category</th>
                                                    <th>Name</th>
                                                    <th>Actions</th>

                                                </tr>
                                            </thead>
                                            <tbody id="categoryTableBody">
                                                @foreach ($categories as $item)
                                                    <tr>
                                                        <input type="hidden" class="delete_val"
                                                            value="{{ $item->id }}">
                                                        <td>{{ $item->id }}</td>
                                                        <td>{{ $item->parentCategory ? $item->parentCategory->name : 'N/A' }}
                                                        </td>
                                                        <td>{{ $item->name }}</td>
                                                        <td><a class="" onclick="EditModal({{ $item }})"><i
                                                                    class="ft-edit text-info"></i> </a> <a class=""
                                                                id="cancel-button"><i class="ft-trash text-danger"></i></a>
                                                        </td>
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
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel1">Add Category</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="row g-3">
                                    @csrf
                                    <input type="hidden" name="id" id="id">
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Select Parent Category</label> <span
                                            class="text-danger">*</span>
                                        <select name="parent_cat_id" id="parent_cat_id"
                                            class="form-control parentcategoryselect">
                                            <option value="" selected disabled>--Select--</option>
                                            @foreach ($parentCategories as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <div id="parentCat" class="text-danger"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="name" class="form-label">Name</label> <span
                                            class="text-danger">*</span>
                                        <input type="text" class="form-control" name="name" id="name">
                                        <div id="nameError" class="text-danger"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <img id="imgPreview" src="https://via.placeholder.com/150" alt="Preview Image"
                                            class="mt-2 img-thumbnail"> <br>
                                        <label for="img" class="form-label">Image</label>

                                        <input type="file" class="form-control" id="img"
                                            onchange="previewImage(event)">

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
        function previewImage(event) {
            var input = event.target;
            var reader = new FileReader();
            reader.onload = function() {
                var imgPreview = document.getElementById('imgPreview');
                imgPreview.src = reader.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
        const EditModal = (item) => {
            $('#myModalLabel1').text('Edit Category');
            $('#id').val(item.id);
            $('#parent_cat_id').val(item.parent_cat_id);
            $('#name').val(item.name);
            const assetUrl = "{{ asset('') }}"; // Get base asset URL
            const imgUrl = assetUrl + 'categories/' + item.img;
            var imgPreview = document.getElementById('imgPreview');
            imgPreview.src = imgUrl

            // Show modal
            $('#default').modal('show');
        }

        const addModal = () => {
            $('#myModalLabel1').text('Add Category');
            $('#id').val('');
            $('#parent_cat_id').val('');
            $('#name').val('');
            $('#img').val('');
            var imgPreview = document.getElementById('imgPreview');
            imgPreview.src = "https://via.placeholder.com/150";
        }

        $(document).ready(function() {

            //Submit Form
            // Event handler for form submission
            $('#submitForm').on('click', function() {
                var formData = new FormData();
                var id = $('#id').val();
                var parent_cat_id = $('#parent_cat_id').val();
                var name = $('#name').val();
                var img = $('#img')[0].files[0]; // Get the first file selected in the input element

                var nameError = $('#nameError');
                var parentCat = $('#parentCat');

                // Clear previous error messages
                nameError.text('');
                parentCat.text('');
                if (parent_cat_id === null) {
                    parentCat.text('Parent Category is required.');
                    return;
                }

                if (!name) {
                    nameError.text('Name is required.');
                    return;
                }


                formData.append('id', id);
                formData.append('parent_cat_id', parent_cat_id);
                formData.append('name', name);
                if (img !== undefined) {
                    formData.append('img', img);

                }

                $.ajax({
                    url: "{{ route('admin.category.store') }}", // Replace 'your.route.name' with the actual route name
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Handle success response
                        toastr.success(response.message);
                        $('#default').modal(
                            'hide'); // Hide the modal after successful submission
                        location.reload(); // Reload the window or update the table as needed
                    },
                    error: function(xhr) {
                        // Handle error response
                        console.log(xhr.responseText);
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
                                    "{{ route('admin.category.destroy', 'item_id') }}",
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
