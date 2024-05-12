@extends('backend.admin.layouts.master')
@section('title')
    {{ __('Stock Issue ') }}
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
                                            <h4 class="card-title">Branch Issuance</h4>

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

                                        <table class="table table-striped table-bordered" id="senRecTabel">
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
                                <h4 class="modal-title" id="myModalLabel1">Add Branch Issuance</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="addSenRecForm">
                                    @csrf
                                    <input type="hidden" name="id" id="id">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="date" class="form-label">Date</label> <span
                                                class="text-danger">*</span>
                                            <input type="date" class="form-control" name="date" id="date">
                                            <div id="dateError" class="text-danger"></div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="branch_id" class="form-label">Select Branch</label> <span
                                                class="text-danger">*</span>
                                            <select name="branch_id" id="branch_id" class="select2 form-control">
                                                <option value="" selected disabled>--Select--</option>
                                                @foreach ($branches as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <div id="branchError" class="text-danger"></div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="sender_id" class="form-label">Select Sender</label> <span
                                                class="text-danger">*</span>
                                            <select name="sender_id" id="sender_id" class="select2 form-control">
                                                <option value="" selected disabled>--Select--</option>
                                                @foreach ($sedRec as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <div id="senderError" class="text-danger"></div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 mt-2">
                                            <label for="receiver_id" class="form-label">Select Receiver</label> <span
                                                class="text-danger">*</span>
                                            <select name="receiver_id" id="receiver_id" class="select2 form-control">
                                                <option value="" selected disabled>--Select--</option>
                                                @foreach ($sedRec as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <div id="receiverError" class="text-danger"></div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <label>Select Product</label>
                                            <div class="search-box input-group">
                                                <button type="button" class="btn btn-secondary btn-lg"><i
                                                        class="la la-barcode"></i></button>
                                                <input type="text" oninput="searProducts(this.value)" name="product_code_name" id="lims_productcodeSearch"
                                                    placeholder="Please type product code and select..."
                                                    class="form-control" />
                                            </div>
                                            <div id="search-results">
                                                <ul id="search-product">
                                                </ul>
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
@endsection
@section('scripts')
    <script>
        const addModal = () => {
            $('#myModalLabel1').text('Add Sender/Receiver');
            $('#date').val('');
            $('#branch_id').val('');
            $('#sender_id').val('');
            $('#receiver_id').val('');

        }

        $(document).ready(function() {
            // Store the original receiver options
            var originalReceiverOptions = $('#receiver_id').html();

            // Event handler for sender select change
            $('#sender_id').on('change', function() {
                var senderId = $(this).val();
                var filteredOptions = $(originalReceiverOptions).filter(function() {
                    // Filter out the sender from receiver options
                    return $(this).val() !== senderId;
                });
                $('#receiver_id').html(filteredOptions);
            });
        });
    </script>
@endsection
