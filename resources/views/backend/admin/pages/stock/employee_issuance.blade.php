@extends('backend.admin.layouts.master')
@section('title')
    {{ __('Employee Issue ') }}
@endsection
@section('content')
<!-- Latest compiled and minified CSS -->

    <style>
        #search-results {
            display: none;
            position: absolute;
            top: 100%;
            left: 5%;
            width: 90%;
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 2px 4px rgba(0, 0, 0, .2);
            z-index: 1;
        }

        #search-results>ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        #search-results li {
            padding: 10px;
            cursor: pointer;
        }

        #search-results li:hover {
            background-color: #f2f2f2;
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
                                            <h4 class="card-title">Employee Issuance</h4>

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

                                        <table class="table table-striped table-bordered" id="branchIssueTabel">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Item No</th>
                                                    <th>Serial No</th>
                                                    <th>Branch</th>
                                                    <th>Employee</th>
                                                    <th>Employee Issue</th>
                                                    <th>Issue Date</th>

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
                                <h4 class="modal-title" id="myModalLabel1">Add Employee Issuance</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="employeeissueform">
                                    @csrf
                                    <input type="hidden" name="id" id="id">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="date" class="form-label">Date</label> <span
                                                class="text-danger">*</span>
                                            <input type="date" class="form-control" name="created_at" id="created_at">
                                            <div id="dateError" class="text-danger"></div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="branch_id" class="form-label">Select Branch</label> <span
                                                class="text-danger">*</span>
                                            <select name="branch_id" id="branch_id" title="--Select--" class="selectpicker" data-live-search="true">
                                                @foreach ($branches as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <div id="branchError" class="text-danger"></div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="employee_id" class="form-label">Select Employee</label> <span
                                                class="text-danger">*</span>
                                            <select name="employee_id" id="employee_id" title="--Select--" class="selectpicker" data-live-search="true">
                                                @foreach ($users as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <div id="senderError" class="text-danger"></div>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label for="customer_id" class="form-label">Select Customer</label> <span
                                                class="text-danger">*</span>
                                            <select name="customer_id" id="customer_id" title="--Select--" class="selectpicker" data-live-search="true" >
                                                @foreach ($customers as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <div id="senderError" class="text-danger"></div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <label>Select Product</label>
                                            <div class="search-box input-group">
                                                <button type="button" class="btn btn-secondary btn-lg"><i
                                                        class="la la-barcode"></i></button>
                                                <input type="text" oninput="searProducts(this.value)"
                                                    name="product_code_name" id="lims_productcodeSearch"
                                                    placeholder="Please type product code and select..."
                                                    class="form-control" />
                                            </div>
                                            <div id="search-results">
                                                <ul id="search-product">
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-5">
                                        <div class="col-md-12">
                                            <h5>Orders Table <span class="text-danger">*</span></h5>
                                            <div class="table-responsive mt-3">
                                                <table id="myTable"
                                                    class="table table-hover table-striped table-bordered order-list">
                                                    <thead>
                                                        <tr>
                                                            <th><input type="checkbox" class="select-all"
                                                                    style="cursor: pointer"></th>
                                                            <th>#</th>
                                                            <th>{{ 'Serial No / ICCID No' }}</th>
                                                            <th>{{ 'Imei No / Sim No' }}</th>
                                                            <th>Created At</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="table-data">
                                                    </tbody>
                                                </table>
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
            $('#myModalLabel1').text('Add Employee Issuance');
            $('#created_at').val('');
            $('#branch_id').val('');
            $('#employee_id').val('');
        }

        // Function to fetch brands data via AJAX and populate DataTable
        var table = $('#branchIssueTabel').DataTable({
            ajax: "{{ route('admin.stock.employeeIsssue') }}",
            "scrollX": true,
            columns: [{
                    "data": "id"
                },
                {
                    "data": "item_no"
                },
                {
                    "data": "serial_no"
                },
                {
                    "data": null,
                    "render": function(data, type, row) {
                        return `<p>${row.branch && row.branch.name ? row.branch.name : 'N/A'}</p>`;
                    }
                },
                {
                    "data": null,
                    "render": function(data, type, row) {
                        return `<p>${row.employee && row.employee.name ? row.employee.name : 'N/A'}</p>`;
                    }
                },
                {
                    "data": null,
                    "render": function(data, type, row) {
                        var badgeClass = row.is_employee_issued ? 'success' : 'warning';
                        var statusText = row.is_employee_issued ? 'Issued' : 'Not Issued';
                        return `<span class="badge rounded-pill bg-${badgeClass}">${statusText}</span>`;
                    }
                },
                {
                    "data": "employee_issued_at"
                },

            ]
        });

        //Submit Form
        $('#submitForm').on('click', function() {
            var btn = $(this); // Cache the button element

            // Disable the button to prevent multiple submissions
            btn.prop('disabled', true);

            $.ajax({
                url: "{{ route('admin.stock.store') }}",
                type: 'POST',
                data: $('#employeeissueform').serialize(),
                success: function(response) {
                    // Handle success response
                    toastr.success(response.message);
                    // Hide the modal after successful submission
                    $('#default').modal('hide');
                    location.reload();
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
    <script type="text/javascript">
        // Get all checkboxes with the class "select-all"
        var checkboxes = document.querySelectorAll('.select-all');

        document.querySelector('thead .select-all').addEventListener('change', function() {
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = event.target.checked;
            });
        });

        const searProducts = (val) => {
            if (val.length > 0) {
                $.ajax({
                    type: 'GET',
                    url: "{{ route('admin.search.product') }}",
                    data: {
                        query: val
                    },
                    success: (res) => {
                        console.log();
                        if (res.count > 0) {
                            ele('search-results').style.display = "block";
                            addList(res.data);
                        } else {
                            ele('search-results').style.display = "none";
                        }
                    }
                })
            } else {
                ele('search-results').style.display = "none";
            }
        }

        const addList = (products) => {
            var html = "";
            products.forEach((product) => {
                html += `
                    <li onclick="getProductItems(${product.id})">${product.name}</li>
                `;
            })

            ele('search-product').innerHTML = html;
        }

        const getProductItems = (id) => {
            var branch_id = ele('branch_id').value;

            $.ajax({
                type: 'GET',
                url: "{{ route('admin.product.items') }}",
                data: {
                    branch_id: branch_id,
                    query: id
                },
                success: (res) => {
                    console.log();
                    if (res.count > 0) {
                        addItemsData(res.data);
                    } else {
                        ele('table-data').innerHTML = "";
                    }
                }
            })
            ele('lims_productcodeSearch').value = '';
            ele('search-results').style.display = "none";
        }

        const addItemsData = (items) => {
            var html = "";
            items.forEach((item, index) => {
                html += `
                <tr>
                    <td><input type="checkbox" class="select-all" value="${item.id}" name="items[]"></td>
                    <td>${index + 1}</td>
                    <td>${item.serial_no}</td>
                    <td>${item.item_no}</td>
                    <td>${convertDate(item.created_at)}</td>
                </tr>
                `;
            });

            ele('table-data').innerHTML = html;
            checkboxes = document.querySelectorAll('.select-all');
        }

        $("ul#issuance").siblings('a').attr('aria-expanded', 'true');
        $("ul#issuance").addClass("show");
        $("ul#issuance #warehouse-list-menu").addClass("active");
    </script>
@endsection
