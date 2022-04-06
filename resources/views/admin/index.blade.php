@extends('includes.app')
    @section('content')

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

         <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-uppercase mb-1"> Total Users</div>
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $members }}</div>
                </div>
                <div class="col-auto">
                    <i class="fa fa-users fa-2x text-info"></i>
                </div>
                </div>
            </div>
            </div>
        </div>



        <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">New Orders</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $neworder }}</div>
              </div>
              <div class="col-auto">
                <i class="fa fa-calendar fa-2x text-success"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-uppercase mb-1">Monthly Sell </div>
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"> {{ number_format($monthly_earn,2) }} BDT.</div>

                </div>
                <div class="col-auto">
                    <i class="fa fa-user fa-2x text-info"></i>
                </div>
                </div>
            </div>
            </div>
        </div>

         <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-uppercase mb-1">Delivery Boy </div>
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"> {{ $boy }}</div>

                </div>
                <div class="col-auto">
                    <i class="fa fa-users fa-2x text-danger"></i>
                </div>
                </div>
            </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <div id="barchart_material" style="width: 100%; height: 500px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    @endsection
    @section('script')
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['bar']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['id', 'amount'],
                    @php
                        foreach($orders as $order) {
                            echo "['".$order->day."', ".$order->Total."],";
                        }
                    @endphp
                ]);
                var options = {
                    chart: {
                        title: 'Month | @php echo $today = @date('M') @endphp',
                    },
                    bars: 'vertical'
                };
                var chart = new google.charts.Bar(document.getElementById('barchart_material'));
                chart.draw(data, google.charts.Bar.convertOptions(options));
            }
        </script>
    @endsection
