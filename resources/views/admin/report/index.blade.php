@extends('includes.app')
    @section('content')

        <div class="content mt-3 mb-5">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $page_name }} </h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('reports.search') }}" method="get" role="search">
                        <div class="form-group ml-3">
                            <label>Select Month: <sup class="text-danger">*</sup></label>
                        </div>
                        <div class="form-group input-group col-md-6 col-sm-12">
                            <select class="form-control" name="search">
                                <option>---------Select Month---------</option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">Agust</option>
                                <option value="9">September</option>
                                <option value="10">Octabor</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                            <button type="submit" id="search" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                        </div>
                    </form>

                    <div class="mb-5"></div>
                    @if(isset($data) == true)
                        @if($data->count())
                            <div class="table-responsive p-3 mt-3">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Invoice </th>
                                            <th>Amount</th>
                                            <th>Order Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $i=>$order)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $order->invoice_number }}</td>
                                                <td>{{ number_format($order->amount,2) }}</td>
                                                <td>{{ date('m-d-Y', strtotime($order->created_at)) }}</td>
                                                <td>
                                                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info rounded"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td></td>
                                            <td>Total</td>
                                            <td>
                                            {{ number_format($total,2) }}
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-danger">Data Not Found...!</div>
                        @endif
                    @endif
                </div>
            </div>
        </div>

    @endsection
    @section('script')
        <script>
            $(document).ready(function() {
                var table = $('#bootstrap-data-table-export').DataTable( {
                    lengthChange: false,
                    buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
                } );

                table.buttons().container()
                    .appendTo( '#example_wrapper .col-md-6:eq(0)' );
            } );
        </script>
    @endsection
