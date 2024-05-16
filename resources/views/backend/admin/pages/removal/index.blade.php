@extends('backend.admin.layouts.master')
@section('title')
    {{ __('Roles') }}
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
                                            <h4 class="card-title">Removals</h4>

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

                                        <table class="table table-striped table-bordered" id="removalTabel">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Stock</th>
                                                    <th>Item No</th>
                                                    <th>Serial No</th>
                                                    <th>Reason</th>
                                                    <th>Removal Date</th>

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
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel1">Add Removal</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="row g-3" id="addRemovalForm">
                                    @csrf
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Select Stock Type *</label>
                                            <select required name="stock" class="form-control">
                                                <option value="" selected disabled>--Select--</option>
                                                <option value="1">Main Stock</option>
                                                <option value="2">Dead Stock</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Select Imei *</label>
                                            <select required name="item_no" id="item_no" class="form-control">
                                                <option value="" selected disabled>--Select--</option>
                                                @foreach ($item_no as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->item_no }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Select Sim *</label>
                                            <select required name="serial_no" id="serial_no" class="form-control">
                                                <option value="" selected disabled>--Select--</option>
                                                @foreach ($serial_no as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->serial_no }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Removal Reason</label>
                                            <textarea type="text" rows="5" name="reason" id="reason" class="form-control"
                                                placeholder="Enter removal reason..."></textarea>
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
@endsection
@section('scripts')
    <script>
        const addModal = () => {
            $('#myModalLabel1').text('Add Removal');
            $('#stock').val('');
            $('#item_no').val('');
            $('#serial_no').val('');
            $('#reason').val('');
        }

        $(document).ready(function() {

            // Function to fetch brands data via AJAX and populate DataTable
            var table = $('#removalTabel').DataTable({
                ajax: "{{ route('admin.removal.index') }}",
                columns: [{
                        "data": "id"
                    },
                    {
                        "data": null,
                        "render": function(data, type, row) {
                            var badgeClass = row.stock === 1 ? 'success' : 'danger';
                            var statusText = row.stock === 1 ? 'Main Stock' : 'Dead Stock';
                            return `<span class="badge rounded-pill bg-${badgeClass}">${statusText}</span>`;
                        }
                    },
                    {
                        "data": null,
                        "render": function(data, type, row) {
                            return `<p>${row.item_no && row.item_no.item_no ? row.item_no.item_no : 'N/A'}</p>`;
                        }
                    },
                    {
                        "data": null,
                        "render": function(data, type, row) {
                            return `<p>${row.serial_no && row.serial_no.serial_no ? row.serial_no.serial_no : 'N/A'}</p>`;
                        }
                    },
                    {
                        "data": "reason"
                    },
                    {
                        "data": null,
                        render: function(data, row, type) {
                            return `<p>${convertDate(data.created_at)}</p>`;
                        }
                    },

                ]
            });

            //Submit Data Modal
            $('#submitForm').on('click', function() {
                var btn = $(this); // Cache the button element

                // Disable the button to prevent multiple submissions
                btn.prop('disabled', true);

                $.ajax({
                    url: "{{ route('admin.removal.store') }}",
                    type: 'POST',
                    data: $('#addRemovalForm').serialize(),
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

        });
    </script>
@endsection
