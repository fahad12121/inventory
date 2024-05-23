@extends('backend.admin.layouts.master')
@section('title')
    {{ __('Edit User') }}
@endsection
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/users.css') }}">
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div id="user-profile">
                    <div class="row">
                        <div class="col-12">
                            <div class="card profile-with-cover">
                                <div class="card-img-top img-fluid bg-cover height-300"
                                    style="background: url('{{ $user->cover_img ? asset('users/' . $user->cover_img) : asset('app-assets/images/carousel/22.jpg') }}'); background-position: center; object-fit: cover;">
                                </div>
                                <div class="media profil-cover-details w-100">
                                    <div class="media-left pl-2 pt-2">
                                        <a href="#" class="profile-image">
                                            <img src="{{ $user->profile_img ? asset('users/' . $user->profile_img) : asset('app-assets/images/portrait/small/avatar-s-8.png') }}"
                                                class="rounded-circle img-border height-100" alt="Card image">
                                        </a>
                                    </div>
                                    <div class="media-body pt-3 px-2">
                                        <div class="row">
                                            <div class="col">
                                                <h3 class="card-title">{{ $user->name ? $user->name : 'N/A' }}</h3>
                                            </div>
                                            <div class="col text-right">

                                                <div class="btn-group d-none d-md-block float-right ml-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                                        data-target="#default"><i class="la la-pencil"></i> Edit</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <nav class="navbar navbar-light navbar-profile align-self-end">
                                    <button class="navbar-toggler d-sm-none" type="button" data-toggle="collapse"
                                        aria-expanded="false" aria-label="Toggle navigation"></button>
                                    <nav class="navbar navbar-expand-lg">
                                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                            <ul class="navbar-nav mr-auto">


                                            </ul>
                                        </div>
                                    </nav>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Zero configuration table -->
                <section id="configuration">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4 class="card-title">Profile Detail</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <div class="row g-3">
                                            @php
                                            @endphp
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" class="form-control" readonly
                                                        value="{{ $user->name ? $user->name : 'N/A' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" readonly
                                                        value="{{ $user->email ? $user->email : 'N/A' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input type="text" class="form-control" readonly
                                                        value="{{ $user->phone ? $user->phone : 'N/A' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input type="text" class="form-control" readonly
                                                        value="{{ $user->address ? $user->address : 'N/A' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input type="text" class="form-control" readonly
                                                        value="{{ $user->city ? $user->city : 'N/A' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <br>
                                                    @php
                                                        $badgeClass = $user->is_active ? 'success' : 'danger';
                                                        $statusText = $user->is_active ? 'Active' : 'Deactive';
                                                    @endphp
                                                    <span class="badge rounded-pill bg-{{ $badgeClass }}"
                                                        style="margin-top: 17px">{{ $statusText }}</span>
                                                </div>
                                            </div>

                                        </div>
                                        <br>

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
                                    <input type="hidden" name="id" id="id" value="{{ $user->id }}">

                                    <div class="col-md-6">
                                        <img id="cover_img_preview"
                                            src="{{ asset('app-assets/images/carousel/22.jpg') }}"
                                            alt="Cover Image Preview"
                                            style="display:none; width: 100%; margin-top: 10px;">
                                        <label for="cover_img" class="form-label">Cover Image</label>
                                        <input type="file" class="form-control" name="cover_img" id="cover_img"
                                            onchange="previewImage(event, 'cover_img_preview')">
                                    </div>
                                    <div class="col-md-6">
                                        <img id="profile_img_preview"
                                            src="{{ asset('app-assets/images/portrait/small/avatar-s-8.png') }}"
                                            alt="Profile Image Preview"
                                            style="display:none; width: 100%; margin-top: 10px;">
                                        <label for="profile_img" class="form-label">Profile Image</label>
                                        <input type="file" class="form-control" name="profile_img" id="profile_img"
                                            onchange="previewImage(event, 'profile_img_preview')">
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            value="{{ $user->name }}">
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            value="{{ $user->email }}">
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="number" min="0" class="form-control" name="phone"
                                            value="{{ $user->phone }}" id="phone">
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" class="form-control" name="address" id="address"
                                            value="{{ $user->address }}">
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="city" class="form-label">City</label> <span
                                            class="text-danger">*</span>
                                        <input type="text" class="form-control" name="city" id="city"
                                            value="{{ $user->city }}">
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <label for="password" class="form-label">Password</label> <span
                                            class="text-danger">*</span>
                                        <input type="password" name="password" id="password" class="form-control">
                                    </div>
                                    <input type="hidden" name="is_active" id="is_active"
                                        value="{{ $user->is_active }}">
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
        function previewImage(event, previewId) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById(previewId);
                output.src = reader.result;
                output.style.display = 'block';
            }
            reader.readAsDataURL(event.target.files[0]);
        }

        $(document).ready(function() {
            //Submit Data Modal
            // Event handler for form submission
            $('#submitForm').on('click', function() {
                var formData = new FormData();
                var id = $('#id').val();
                var name = $('#name').val();
                var email = $('#email').val();
                var phone = $('#phone').val();
                var address = $('#address').val();
                var city = $('#city').val();
                var password = $('#password').val();
                var is_active = $('#is_active').val();
                var cover_img = $('#cover_img')[0].files[
                    0]; // Get the first file selected in the input element
                var profile_img = $('#profile_img')[0].files[
                    0]; // Get the first file selected in the input element

                formData.append('id', id);
                formData.append('name', name);
                formData.append('email', email);
                if (password != '') {
                    formData.append('password', password);

                }
                formData.append('phone', phone);
                formData.append('is_active', is_active);
                formData.append('address', address);
                formData.append('city', city);

                if (cover_img !== undefined) {
                    formData.append('cover_img', cover_img);

                }
                if (profile_img !== undefined) {
                    formData.append('profile_img', profile_img);

                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('admin.user.store') }}", // Replace 'your.route.name' with the actual route name
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Handle success response
                        toastr.success(response.message);
                        $('#default').modal(
                            'hide'); // Hide the modal after successful submission
                        location.reload();
                    },
                    error: function(xhr) {
                        // Handle error response
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
