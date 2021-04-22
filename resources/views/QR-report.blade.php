@extends('layout')
@section('page_title', session('name') . ' Dashboard')
@section('', 'active')
@section('container')

    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @if (session()->has('msg'))
                            <p class="text-center text-success alert-success p-1 mb-3">{{ session('msg') }}</p>
                        @endif
                        <div class="overview-wrap">
                            <h2 class="title-1">overview</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h2 class="title-1 m-b-25 text-center">Qr's Report</h2>
                        <div class="row my-5">
                            <div class="col-md-4 col-sm-12">
                                <div class="card" id="device">

                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="card" id="browser">

                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="card" id="os">

                                </div>
                            </div>
                        </div>
                        <div class="table-responsive table--no-card m-b-40">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>IP Address</th>
                                        <th>City</th>
                                        <th class="text-center">Scanned On</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($data != '')
                                        @php
                                            $i = 0;
                                        @endphp
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $item->ip_address }}</td>
                                                <td>{{$item->city}}</td>
                                                <td class="text-center">{{ $item->created_at }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        No data found
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(deviceChart);
        google.charts.setOnLoadCallback(browserChart);
        google.charts.setOnLoadCallback(osChart);

        function deviceChart() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                @foreach ($Devicecount as $key => $count)
                    ['{{ $key }}',{{ $count }}],
                @endforeach
            ]);


            var options = {
                title: 'Device Report',
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('device'));
            chart.draw(data, options);
        }

        function browserChart() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                @foreach ($BrowserCount as $key => $count)
                    ['{{ $key }}',{{ $count }}],
                @endforeach
            ]);


            var options = {
                title: 'Browser Report',
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('browser'));
            chart.draw(data, options);
        }

        function osChart() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                @foreach ($OsCount as $key => $count)
                    ['{{ $key }}',{{ $count }}],
                @endforeach
            ]);


            var options = {
                title: 'OS Report',
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('os'));
            chart.draw(data, options);
        }

    </script>
@endsection
