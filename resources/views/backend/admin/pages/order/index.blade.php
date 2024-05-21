@extends('backend.admin.layouts.master')
@section('title')
    {{ __('Orders') }}
@endsection
@section('content')
    <style>
        .image-preview {
            display: flex;
            flex-wrap: wrap;
        }

        .image-preview-item {
            position: relative;
            margin-bottom: 15px;
        }

        .image-preview-item img {
            width: 100%;
            height: auto;
        }

        .image-preview-item .remove-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            background: red;
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            padding: 2px 5px;
        }

        .image-container {
            width: 100%;
            height: 150px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .image-container img {
            max-width: 100%;
            max-height: 100%;
        }
    </style>
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
                                            <h4 class="card-title">Orders</h4>
                                        </div>
                                        @if (Auth::user()->role_id === 3)
                                            <div class="col-md-2">
                                                <button type="button" id="addBtn" class="btn btn-outline-primary block"
                                                    data-toggle="modal" data-target="#default" onclick="addModal()">
                                                    +Add
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">

                                        <table class="table table-striped table-bordered" id="OrderTabel">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Customer</th>
                                                    <th>Vehicles</th>
                                                    <th>Order Type</th>
                                                    <th>Staus</th>
                                                    <th>Assign</th>
                                                    <th>Tech Status</th>
                                                    <th>Action</th>
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
                                <h4 class="modal-title" id="myModalLabel1">Add Order</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="row g-3" id="addOrderForm">
                                    @csrf
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>No of Vehicles</label> <span class="text-danger">*</span>
                                            <input type="number" min="0" class="form-control" name="vehicles"
                                                id="vehicles">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Select Service</label> <span class="text-danger">*</span>
                                            <select name="service_id" id="service_id" class="form-control">
                                                <option value="" selected disabled>--Select--</option>
                                                @foreach ($services as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Location</label> <span class="text-danger">*</span>
                                            <input type="text" name="location" id="location" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Date & Time</label> <span class="text-danger">*</span>
                                            <input type="datetime-local" name="date" id="date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Upload Image & PDF</label>
                                            <input type="file" name="file" id="file" class="form-control"
                                                accept="image/*,application/pdf">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Order Type</label> <span class="text-danger">*</span>
                                            <select name="order_type" id="order_type" class="form-control">
                                                <option value="" selected disabled>--Select OrderType--</option>
                                                <option value="Normal">Normal</option>
                                                <option value="Urgent">Urgent</option>
                                                <option value="Very Urgent">Very Urgent</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Note</label>
                                            <textarea type="text" name="note" id="note" rows="5" name="note" class="form-control"
                                                placeholder="Enter note..."></textarea>
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

                <!-- Delivery Note Modal -->
                <div class="modal fade text-left" id="deliveryModal" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel1">Upload Delivery Note</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="row g-3" id="addDeliveryForm">
                                    @csrf
                                    <input type="hidden" name="order_id" id="order_id" value="">
                                    <input type="hidden" name="technician_id" id="technician_id" value="">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Upload Images</label>
                                            <div class="image-preview" id="image-preview"></div>
                                            <input type="file" name="files[]" id="files" class="form-control"
                                                accept="image/*" multiple onchange="previewImages(event)">
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">

                                <button type="button" id="submitFormDeliveryForm"
                                    class="btn btn-outline-primary">Submit</button>
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
        const addModal = () => {
            $('#myModalLabel1').text('Add Order');
            $('#vehicles').val('');
            $('#service_id').val('');
            $('#location').val('');
            $('#date').val('');
            $('#file').val('');
            $('#order_type').val('');
            $('#note').val('');
        }
        const showDeliveryNoteModal = (data) => {
            $('#order_id').val(data.id);
            $('#technician_id').val(data.technician_id);
            $('#deliveryModal').modal('show');
        }

        var role_id = "{{ Auth::user()->role_id }}";

        //tech
        var employees = {!! json_encode($users) !!};
        var table;

        $(document).ready(function() {

            $('#OrderTabel').on('xhr.dt', function(e, settings, json, xhr) {
                var api = new $.fn.dataTable.Api(settings);

                // Replace with your actual condition
                var showColumn = role_id == 4 ? false : true;
                api.columns([5]).visible(showColumn);

            });

            // Function to get status colors
            function getStatusColors(status_id) {
                switch (status_id) {
                    case 1: // Start
                        return {
                            backgroundColor: '#a0f98b', textColor: 'black'
                        };
                    case 2: // Preparing Order
                        return {
                            backgroundColor: '#9ba0f0', textColor: 'black'
                        };
                    case 3: // Out for Delivery
                        return {
                            backgroundColor: '#ffb788', textColor: 'black'
                        };
                    case 4: // Installation and Testing
                        return {
                            backgroundColor: '#9fa1ad', textColor: 'black'
                        };
                    case 5: // Under Integration
                        return {
                            backgroundColor: '#6dc0f6', textColor: 'black'
                        };
                    case 6: // Close
                        return {
                            backgroundColor: '#ff8898', textColor: 'black'
                        };
                    default:
                        return {
                            backgroundColor: '', textColor: 'black'
                        };
                }
            }

            // Function to check if a date is today
            function isToday(dateString) {
                const today = new Date();
                const date = new Date(dateString);
                return date.getFullYear() === today.getFullYear() &&
                    date.getMonth() === today.getMonth() &&
                    date.getDate() === today.getDate();
            }

            // // Function to fetch brands data via AJAX and populate DataTable
            table = $('#OrderTabel').DataTable({
                ajax: "{{ route('admin.orderList.index') }}",
                "scrollX": true,
                "order": [
                    [0, 'desc']
                ],
                "rowCallback": function(row, data, index) {
                    let backgroundColor = '';
                    let textColor = 'black';

                    if (isToday(data.created_at)) {
                        backgroundColor = '#ff7783'; // Red background for today's orders
                        textColor = 'white';
                    } else if (data.statuses && data.statuses.length > 0) {
                        const latestStatus = data.statuses[data.statuses.length - 1];
                        const colors = getStatusColors(latestStatus.status_id);
                        backgroundColor = colors.backgroundColor;
                        textColor = colors.textColor;
                    }

                    $(row).css({
                        'background-color': backgroundColor,
                        'color': textColor
                    });
                    // Set fixed height for each row
                    $(row).css({
                        'height': '10px', // Adjust height as needed
                        'box-sizing': 'border-box' // Include padding and borders in height calculation
                    });
                },
                columns: [{
                        "data": null,
                        "render": function(data, type, row) {
                            var routeUrl = "{{ route('admin.orderList.show', ':id') }}";
                            routeUrl = routeUrl.replace(':id', data.id);
                            return `<a href="${routeUrl}" class="info" data-id="${row.id}" >
                                        ${row.id}
                                    </a>`;
                        }
                    },
                    {
                        "data": null,
                        "render": function(data, type, row) {
                            return `<p>${row.customer && row.customer.name ? row.customer.name : 'N/A'}</p>`;
                        }
                    },
                    {
                        "data": "vehicles"
                    },

                    {
                        "data": "order_type"
                    },
                    {
                        "data": null,
                        render: function(data, row, type) {
                            if (role_id == 2) {
                                return `<div class="form-group">
                                        <select required name="status_id" class="form-control changeStatus">
                                            <option value="" selected disabled >--Select--</option>
                                            <option value="1" ${data.statuses && data.statuses.length > 0 && data.statuses[data.statuses.length - 1].status_id == 1 ? 'selected' : ''}>Start</option>
                                            <option value="2" ${data.statuses && data.statuses.length > 0 && data.statuses[data.statuses.length - 1].status_id == 2 ? 'selected' : ''}>Preparing Order</option>
                                            <option value="3" ${data.statuses && data.statuses.length > 0 && data.statuses[data.statuses.length - 1].status_id == 3 ? 'selected' : ''}>Out for Delivery</option>
                                            <option value="4" ${data.statuses && data.statuses.length > 0 && data.statuses[data.statuses.length - 1].status_id == 4 ? 'selected' : ''}>Installation and Testing</option>
                                            <option value="5" ${data.statuses && data.statuses.length > 0 && data.statuses[data.statuses.length - 1].status_id == 5 ? 'selected' : ''}>Under Integration</option>
                                            <option value="6" ${data.statuses && data.statuses.length > 0 && data.statuses[data.statuses.length - 1].status_id == 6 ? 'selected' : ''} readonly>Close</option>
                                        </select>
                                    </div>`;
                            } else {
                                let color = 'warning';
                                let status = 'Pending';

                                if (data.statuses && data.statuses.length > 0) {
                                    const latestStatus = data.statuses[data.statuses.length - 1];
                                    status = getStatusName(latestStatus
                                        .status_id); // Use the JavaScript function

                                    switch (latestStatus.status_id) {
                                        case 1:
                                            color = 'success';
                                            break;
                                        case 2:
                                            color = 'primary';
                                            break;
                                        case 3:
                                            color = 'warning';
                                            break;
                                        case 4:
                                            color = 'secondary';
                                            break;
                                        case 5:
                                            color = 'info';
                                            break;
                                        case 6:
                                            color = 'danger';
                                            break;
                                            // Add more cases if there are more status IDs
                                        default:
                                            color = 'warning'; // Default color
                                    }
                                }

                                return `<span class="badge badge-${color}">${status}</span>`;
                            }

                        }
                    },
                    {
                        "data": null,
                        render: function(data, row, type) {
                            if (role_id == 2) {
                                var selectOptions =
                                    '<option value="" selected disabled>--Select--</option>'; // Adding the "Please Select" option
                                // Loop through the employees array and create options
                                for (var i = 0; i < employees.length; i++) {
                                    if (data.technician_id == employees[i].id) {
                                        // If data.id matches employees[i].id, set the option as selected
                                        selectOptions += '<option value="' + employees[i].id +
                                            '" selected>' +
                                            employees[i].name + '</option>';
                                    } else {
                                        // Otherwise, just add the option without the selected attribute
                                        selectOptions += '<option value="' + employees[i].id +
                                            '">' +
                                            employees[i].name + '</option>';
                                    }
                                }
                                return `<div class="form-group">
                                            <select required name="technician_id" class="form-control assignOrder" ">
                                            ` + selectOptions + `
                                            </select>
                                            </div>`;
                            } else {
                                return `<span class="badge badge-info">${data.employee && data.employee.name ? data.employee.name : 'N/A'}</span>`;
                            }

                        }
                    },
                    {
                        "data": null,
                        render: function(data, row, type) {
                            if (role_id == 4) {
                                return `<div class="form-group">
                                        <select required name="status_id" class="form-control changeTechStatus">
                                            <option value="" selected disabled >--Select--</option>
                                            <option value="1" ${data.techstatuses && data.techstatuses.length > 0 && data.techstatuses[data.techstatuses.length - 1].status_id == 1 ? 'selected' : ''}>Prepare tools</option>
                                            <option value="2" ${data.techstatuses && data.techstatuses.length > 0 && data.techstatuses[data.techstatuses.length - 1].status_id == 2 ? 'selected' : ''}>Leave office</option>
                                            <option value="3" ${data.techstatuses && data.techstatuses.length > 0 && data.techstatuses[data.techstatuses.length - 1].status_id == 3 ? 'selected' : ''}>Reach destination</option>
                                            <option value="4" ${data.techstatuses && data.techstatuses.length > 0 && data.techstatuses[data.techstatuses.length - 1].status_id == 4 ? 'selected' : ''}>Close order</option>
                                        </select>
                                    </div>`;
                            } else {
                                let color = 'warning';
                                let status = 'Pending';

                                if (data.techstatuses && data.techstatuses.length > 0) {
                                    const latestStatus = data.techstatuses[data.techstatuses
                                        .length - 1];
                                    status = getTechStatusName(latestStatus
                                        .status_id); // Use the JavaScript function
                                    switch (latestStatus.status_id) {
                                        case 1:
                                            color = 'secondary';
                                            break;
                                        case 2:
                                            color = 'info';
                                            break;
                                        case 3:
                                            color = 'primary';
                                            break;
                                        case 4:
                                            color = 'success';
                                            break;
                                            // Add more cases if there are more status IDs
                                        default:
                                            color = 'warning'; // Default color
                                    }
                                }

                                return `<span class="badge badge-${color}">${status}</span>`;
                            }

                        }
                    },
                    {
                        "data": {},
                        render: function(data, type, row) {
                            var routeUrl = "{{ route('admin.orderList.show', ':id') }}";
                            routeUrl = routeUrl.replace(':id', data.id);
                            let textColor = 'black';
                            let backgroundColor = ''; // default background color

                            if (isToday(data.created_at)) {
                                backgroundColor = '#DC3545'; // Red background for today's orders
                                textColor = 'white';
                            } else if (data.statuses && data.statuses.length > 0) {
                                const latestStatus = data.statuses[data.statuses.length - 1];
                                const colors = getStatusColors(latestStatus.status_id);
                                backgroundColor = colors.backgroundColor;
                                textColor = colors.textColor;
                            }

                            let addNoteImagesLink = '';
                            if (role_id == 4) { // Check if the role_id is 4
                                addNoteImagesLink =
                                    `<a class="addNoteImages" data-id="${row.id}" title="Add Delivery Note"><i class="ft-plus text-${textColor}"></i></a>`;
                            }

                            return `
                                    <a href="${routeUrl}" class="info" data-id="${row.id}">
                                        <i class="ft-eye text-${textColor}"></i>
                                    </a>
                                    ${addNoteImagesLink}
                                `;
                        }
                    },

                ],
                columnDefs: [{
                    "targets": [4, 5, 6], // Target the fourth column (index 3)
                    "width": "160px", // Set width to 150 pixels
                }]
            });

            $(document).on('change', '.assignOrder', function() {

                var row = $(this).closest('tr');
                var data = table.row(row).data(); // Assuming you're using DataTables
                var selectedOption = $(this).val(); // Get the selected option value);
                assignOrder(data.id, selectedOption);
            })

            $(document).on('change', '.changeStatus', function() {

                var row = $(this).closest('tr');
                var data = table.row(row).data(); // Assuming you're using DataTables
                var selectedOption = $(this).val(); // Get the selected option value);
                changeStatus(data.id, selectedOption);
            })
            $(document).on('change', '.changeTechStatus', function() {

                var row = $(this).closest('tr');
                var data = table.row(row).data(); // Assuming you're using DataTables
                var selectedOption = $(this).val(); // Get the selected option value);
                changeTechStatus(data.id, selectedOption, data.technician_id);
            })
            $(document).on('click', '.addNoteImages', function() {

                var row = $(this).closest('tr');
                var data = table.row(row).data(); // Assuming you're using DataTables
                showDeliveryNoteModal(data);

            })

            const assignOrder = (orderId, technicianId) => {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('admin.order.assign') }}", // Specify the URL for the POST request
                    method: 'POST',
                    data: {
                        orderId: orderId,
                        technicianId: technicianId
                    },
                    success: function(response) {
                        // Handle the success response
                        toastr.success(response.message);
                        table.ajax.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle the error response
                        console.error(xhr.responseText);
                    }
                });
            }

            const changeStatus = (orderId, statusId) => {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('admin.order.status.change') }}", // Specify the URL for the POST request
                    method: 'POST',
                    data: {
                        orderId: orderId,
                        status: statusId
                    },
                    success: function(response) {
                        // Handle the success response
                        if (response.code == 404) {
                            toastr.error(response.message);
                            table.ajax.reload();
                        } else {
                            toastr.success(response.message);
                            table.ajax.reload();
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle the error response
                        console.error(xhr.responseText);
                    }
                });
            }
            const changeTechStatus = (orderId, statusId, techId) => {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('admin.order.tech_change_status') }}", // Specify the URL for the POST request
                    method: 'POST',
                    data: {
                        orderId: orderId,
                        tech_id: techId,
                        status: statusId
                    },
                    success: function(response) {
                        // Handle the success response
                        if (response.code == 404) {
                            toastr.error(response.message);
                            table.ajax.reload();
                        } else {
                            toastr.success(response.message);
                            table.ajax.reload();
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle the error response
                        console.error(xhr.responseText);
                    }
                });
            }

            //Submit Data Modal
            $('#submitForm').on('click', function() {
                var btn = $(this); // Cache the button element

                // Disable the button to prevent multiple submissions
                btn.prop('disabled', true);

                var formData = new FormData();

                $('#vehicles, #service_id, #location, #date, #order_type, #note').each(function() {
                    formData.append($(this).attr('id'), $(this).val());
                });

                var file = $('#file')[0].files[0];
                if (file) formData.append('file', file);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('admin.orderList.store') }}",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
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

            // Function to replicate get_name logic
            function getStatusName(status_id) {
                switch (status_id) {
                    case 1:
                        return 'Start';
                    case 2:
                        return 'Preparing';
                    case 3:
                        return 'Delivery';
                    case 4:
                        return 'Installation';
                    case 5:
                        return 'Integration';
                    case 6:
                        return 'Close';
                    default:
                        return 'Pending';
                }
            }

            function getTechStatusName(status_id) {
                switch (status_id) {
                    case 1:
                        return 'Prepare Tools';
                    case 2:
                        return 'Leave Office';
                    case 3:
                        return 'Reach Destination';
                    case 4:
                        return 'Close Order';
                    default:
                        return 'Not Started Yet';
                }
            }

        });


        //upload images

        function previewImages(event) {
            const input = event.target;
            const preview = document.getElementById('image-preview');
            preview.innerHTML = '';

            if (input.files && input.files.length > 0) {
                swal({
                    title: 'Please wait while your request is being processed',
                    allowOutsideClick: false,
                    onBeforeOpen: () => {
                        swal.showLoading();
                    }
                });

                let images = [];
                const totalFiles = input.files.length;

                Array.from(input.files).forEach((file, index) => {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const col = document.createElement('div');
                        col.classList.add('col-md-3', 'image-preview-item');
                        col.setAttribute('data-id', index);
                        col.innerHTML = `
                                        <div class="image-container">
                                            <img src="${e.target.result}" alt="Image Preview">
                                        </div>
                                        <button class="rmImg btn btn-outline-danger block mt-3" data-id="${index}">&times;</button>
                                        `;
                        images.push(col);

                        if (images.length === totalFiles) {
                            setTimeout(() => {
                                swal.close();
                                images.forEach(img => preview.appendChild(img));
                                addRemoveEventListeners();
                            }, 2000); // Close Swal after 2 seconds and then show images
                        }
                    };

                    reader.readAsDataURL(file);
                });
            }
        }

        function addRemoveEventListeners() {
            const removeButtons = document.querySelectorAll('.rmImg');
            removeButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent the default behavior
                    const id = event.target.getAttribute('data-id');
                    removeImage(id);
                });
            });
        }

        function removeImage(id) {
            const preview = document.getElementById('image-preview');
            const filesInput = document.getElementById('files');
            const dt = new DataTransfer();

            Array.from(filesInput.files)
                .filter((file, i) => i != id)
                .forEach(file => {
                    dt.items.add(file);
                });

            filesInput.files = dt.files;
            preview.innerHTML = '';
            previewImages({
                target: filesInput
            });
        }
        //Submit Data Modal
        $('#submitFormDeliveryForm').on('click', function() {
            var btn = $(this); // Cache the button element

            // Disable the button to prevent multiple submissions
            btn.prop('disabled', true);

            const filesInput = document.getElementById('files');
            const formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            for (const file of filesInput.files) {
                formData.append('files[]', file);
            }

            formData.append('order_id', $('#order_id').val());
            formData.append('technician_id', $('#technician_id').val());


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('admin.order.deliveryImg') }}",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // Handle success response
                    toastr.success(response.message);
                    table.ajax.reload();

                    // Hide the modal after successful submission
                    $('#deliveryModal').modal('hide');
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
    </script>
@endsection
