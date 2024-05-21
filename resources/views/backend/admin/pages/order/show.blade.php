@extends('backend.admin.layouts.master')
@section('title')
    {{ __('Order Detail') }}
@endsection

@section('content')
    <style>
        .stepper {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        .step {
            position: relative;
            text-align: center;
            padding: 20px;
            flex: 1;
        }

        .step:not(:last-child)::after {
            content: '';
            position: absolute;
            top: 50%;
            height: 2px;
            width: 100%;
            background-color: #ccc;
            transform: translateY(-50%);
        }

        .step.active {
            color: rgb(26, 164, 93);
        }

        .step.active::before {
            background-color: rgb(26, 164, 93);
        }

        .step.completed {
            color: rgb(26, 164, 93);
        }

        .step.completed::before {
            background-color: rgb(26, 164, 93);
        }

        .step::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            height: 24px;
            width: 24px;
            border-radius: 50%;
            background-color: #ccc;
            border: 2px solid #fff;
            z-index: 1;
        }

        .step span {
            display: block;
            position: relative;
            top: 30px;
        }

        .active-status {
            color: gray;
        }

        .bordered-image {
            border: 2px solid #ddd;
            /* Define your border styles here */
            border-radius: 8px;
            /* Optional: Add border radius for rounded corners */
            padding: 4px;
            /* Optional: Add padding to the border */
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
                                        <div class="col-md-12">
                                            <h4 class="card-title">Order Detail</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <div class="row g-3">
                                            @csrf
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>No of Vehicles</label>
                                                    <input type="number" min="0" class="form-control" readonly
                                                        value="{{ $order->vehicles ? $order->vehicles : 'N/A' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Service</label>
                                                    <input type="text" class="form-control" readonly
                                                        value="{{ optional($order->service)->name ?? 'N/A' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Customer</label>
                                                    <input type="text" class="form-control" readonly
                                                        value="{{ optional($order->customer)->name ?? 'N/A' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Technician</label>
                                                    <input type="text" class="form-control" readonly
                                                        value="{{ optional($order->employee)->name ?? 'N/A' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Location</label>
                                                    <input type="text" class="form-control" readonly
                                                        value="{{ $order->location ? $order->location : 'N/A' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Date Time</label>
                                                    <input type="datetime-local" class="form-control"
                                                        value="{{ $order->date ? $order->date : 'N/A' }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Order Type</label>
                                                    <input type="text" class="form-control" readonly
                                                        value="{{ $order->order_type ? $order->order_type : 'N/A' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Technician Destination Time:</label>
                                                    @php
                                                        if (count($order->Techstatuses) > 0) {
                                                            $preparetools =
                                                                count($order->Techstatuses->where('status_id', 1)) > 0
                                                                    ? $order->Techstatuses
                                                                        ->where('status_id', 1)
                                                                        ->last()
                                                                    : null;
                                                            $leave_office =
                                                                count($order->Techstatuses->where('status_id', 2)) > 0
                                                                    ? $order->Techstatuses
                                                                        ->where('status_id', 2)
                                                                        ->last()
                                                                    : null;
                                                            $reach_destination =
                                                                count($order->Techstatuses->where('status_id', 3)) > 0
                                                                    ? $order->Techstatuses
                                                                        ->where('status_id', 3)
                                                                        ->last()
                                                                    : null;
                                                            $close_order =
                                                                count($order->Techstatuses->where('status_id', 4)) > 0
                                                                    ? $order->Techstatuses
                                                                        ->where('status_id', 4)
                                                                        ->last()
                                                                    : null;
                                                        } else {
                                                            $preparetools = null;
                                                            $leave_office = null;
                                                            $reach_destination = null;
                                                            $close_order = null;
                                                        }
                                                    @endphp
                                                    <input type="text" class="form-control" readonly
                                                        @if ($leave_office && $reach_destination) value="{{ $leave_office->updated_at->diffInMinutes($reach_destination->updated_at) }} minutes" @endif>
                                                </div>
                                            </div>

                                        </div>
                                        <br>
                                        <h4 class="card-title">Order Tracking</h4>
                                        <div class="stepper mt-2">
                                            @php
                                                $statuses = [
                                                    'start' => $order->statuses->where('status_id', 1)->last() ?? null,
                                                    'preparing' => $order->statuses->where('status_id', 2)->last() ?? null,
                                                    'delivery' => $order->statuses->where('status_id', 3)->last() ?? null,
                                                    'installation' => $order->statuses->where('status_id', 4)->last() ?? null,
                                                    'integration' => $order->statuses->where('status_id', 5)->last() ?? null,
                                                    'close' => $order->statuses->where('status_id', 6)->last() ?? null,
                                                ];
                                            @endphp
                                        
                                            @foreach ($statuses as $status => $record)
                                                <div class="step {{ $record != null ? ($status == 'start' ? 'active' : 'completed') : '' }}">
                                                    <b>{{ ucfirst($status) }}</b>
                                                    <div></div>
                                                    <span>
                                                        @if ($record != null)
                                                            <date class="active-status" data-updated-at="{{ strtotime($record->updated_at) }}">
                                                                {{ date('Y-m-d, D, h:i A', strtotime($record->updated_at)) }}
                                                            </date>
                                                        @endif
                                                    </span>
                                                </div>
                                            @endforeach
                                        </div>
                                        <br>
                                        <h4 class="card-title">Delivery Notes</h4>
                                        <div class="row g-3 mt-2">
                                            <br>
                                            @if ($order->DeliveryImages && count($order->DeliveryImages) > 0)
                                                @foreach ($order->DeliveryImages as $item)
                                                    <div class="col-md-3 mt-2">
                                                        <a href="{{ asset('orders/deliveryImg/' . $item->file) }}"
                                                            target="_blank">
                                                            <img src="{{ asset('orders/deliveryImg/' . $item->file) }}"
                                                                alt="" class="img-fluid bordered-image"
                                                                onerror="this.onerror=null; this.src='https://www.shutterstock.com/image-vector/vector-document-flat-icon-260nw-220777075.jpg';">
                                                        </a>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="col-12">
                                                    <p>No delivery images available.</p>
                                                </div>
                                            @endif
                                        </div>
                                        <br>
                                        <h4 class="card-title">Order Image or PDF</h4>
                                        <div class="row g-3 mt-2">
                                            <div class="col-md-6">
                                                
                                                <?php
                                                $filePath = asset('orders/'.$order->file);
                                                
                                                // Get the file extension
                                                $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);
                                                
                                                // Check if it's an image
                                                if (in_array(strtolower($fileExtension), ['jpg', 'jpeg', 'png', 'gif'])) {
                                                    echo '<img src="' . $filePath . '" alt="" height="30%" width="30%" onerror="this.onerror=null; this.src=\'https://www.shutterstock.com/image-vector/vector-document-flat-icon-260nw-220777075.jpg\';">';
                                                } elseif (strtolower($fileExtension) === 'pdf') {
                                                    // Handle PDF case
                                                    echo '<embed src="' . $filePath . '" type="application/pdf" width="100%" height="500px" />';
                                                } else {
                                                    // Handle other file types or no file
                                                    echo '<p>File type not supported or no file available</p>';
                                                }
                                                ?>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Other content for the second column -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Zero configuration table -->

            </div>
        </div>
    </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const dateElements = document.querySelectorAll('.active-status');

        dateElements.forEach(dateElement => {
            const updatedAtTimestamp = parseInt(dateElement.getAttribute('data-updated-at')) * 1000;
            const updatedAtDate = new Date(updatedAtTimestamp);

            // Format the date to Y-m-d, D, h:i A
            const options = {
                year: 'numeric',
                month: '2-digit',
                day: '2-digit',
                weekday: 'short',
                hour: '2-digit',
                minute: '2-digit',
                hour12: true
            };

            // Update the text content of the date element with local time
            dateElement.textContent = updatedAtDate.toLocaleDateString('en-US', options);
        });
    });
</script>
