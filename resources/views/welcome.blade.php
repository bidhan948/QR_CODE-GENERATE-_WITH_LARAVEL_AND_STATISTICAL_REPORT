@extends('layout')
@section('page_title', 'Admin Dashboard')
@section('dashboard', 'active')
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
                            <a class="au-btn au-btn-icon au-btn--blue text-white font-weight-bold"
                                href="{{ url('Add-User') }}">
                                <i class="zmdi zmdi-plus font-weight-bold"></i>add User</a>
                        </div>
                    </div>
                </div>
                <div class="row m-t-25">
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c1">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-account-o"></i>
                                    </div>
                                    <div class="text">
                                        <h2>10368</h2>
                                        <span>members online</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart1"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c2">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-shopping-cart"></i>
                                    </div>
                                    <div class="text">
                                        <h2>388,688</h2>
                                        <span>items solid</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart2"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c3">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-calendar-note"></i>
                                    </div>
                                    <div class="text">
                                        <h2>1,086</h2>
                                        <span>this week</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart3"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c4">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-money"></i>
                                    </div>
                                    <div class="text">
                                        <h2>$1,060,386</h2>
                                        <span>total earnings</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart4"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h2 class="title-1 m-b-25">User's Report</h2>
                        <div class="table-responsive table--no-card m-b-40">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>name</th>
                                        <th>Email</th>
                                        <th>Total Qr / Total Hit</th>
                                        <th>Added On</th>
                                        <th colspan="2" class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td class="text-center">{{ $item->total_qr }} /
                                                <?php echo $retVal = $item->total_hit != '' ?
                                                $item->total_hit : 0; ?></td>
                                            <td class="text-center">{{$item->created_at}}</td>
                                            <td><a href="{{url('Edit-User/'.$item->id)}}" class="btn btn-success">Edit <i class="fas fa-edit p-1"></i></a>
                                            </td>
                                            <td>
                                                @if ($item->status == 1)
                                                    <a href="{{url('Edit-User/0/'.$item->id)}}" class="btn btn-info">Active <i class="fas fa-dot-circle p-1"></i></a></td>
                                                @else
                                                    <a href="url('Edit-User/1/'.$item->id)}}" class="btn btn-danger">Deactive <i class="fas fa-dot-circle p-1"></i></a></td>
                                                @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
