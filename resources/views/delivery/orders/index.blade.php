@extends('includes.app')
    @section('content')

        <div class="content mt-3 mb-5">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $page_name }} </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Order Date</th>
                                    <th>Customer Name</th>
                                    <th>Customer Phone</th>
                                    <th>Amount</th>
                                    <th>Payment</th>
                                    <th>Delivery</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $i=>$order)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ @date('d-m-Y', strtotime($order->created_at))  }}</td>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->phone }}</td>
                                        <td>{{number_format($order->amount,2) }}</td>
                                        <td>
                                            @if ($order->status == 'Processing')
                                                <label class="btn btn-outline-success btn-sm rounded">Complete</label>
                                            @else
                                                <label class="btn btn-outline-danger btn-sm rounded">Pending</label>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($order->process_status == '1')
                                                <label class="btn btn-outline-info btn-sm rounded">Rechived</label>
                                            @elseif ($order->process_status == '2')
                                                <label class="btn btn-outline-primary btn-sm rounded">Picked</label>
                                            @elseif ($order->process_status == '3')
                                                <label class="btn btn-outline-primary btn-sm rounded">Processing</label>
                                            @elseif ($order->process_status == '4')
                                                <label class="btn btn-outline-success btn-sm rounded">Complete</label>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('delivery-orders.show',$order->id) }}" class="btn btn-success btn-small rounded">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    @endsection
