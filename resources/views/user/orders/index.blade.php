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
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Payment</th>
                                    <th>Status</th>
                                    <th>Delivery Boy</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $i=>$order)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ @date('d-m-Y', strtotime($order->created_at))  }}</td>
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
                                                <label class="btn btn-outline-primary btn-sm rounded">Processing</label>
                                            @elseif ($order->process_status == '3')
                                                <label class="btn btn-outline-primary btn-sm rounded">Picked By Delivery Boy</label>
                                            @elseif ($order->process_status == '4')
                                                <label class="btn btn-outline-success btn-sm rounded">Complete</label>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($order->delivery_boy_id == null)
                                                <label class="text-danger">Not Assigned</label>
                                            @else
                                                @php
                                                    $boy_name = DB::table('orders')->join('users','users.id', 'orders.delivery_boy_id')->where('orders.id',$order->id)->get();
                                                @endphp
                                                @foreach ($boy_name as $boy)
                                                    <a href="{{ route('chats.show', $order->delivery_boy_id) }}">{{ $boy->name }} <sup class="text-success">Message Now</sup></a>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('order-lists.show',$order->id) }}" class="btn btn-success btn-small rounded">View</a>
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
