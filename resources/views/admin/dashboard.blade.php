@extends('layouts.admin')

@section('content')
     
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <h1>Dashboard</h1>
        <ol class="breadcrumb">
            <li class="active">Dashboard</li>
        </ol>

    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-2x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$highest_per_day}}</div>
                                    <div>Highest Milk Today</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('organization/return-view/farmers-produce') }}">
                            <div class="panel-footer">
                                <span style="color:purple" class="pull-left">View Details</span>
                                <span style="color:purple" class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-2x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$total_milk_month}} </div>
                                    <div>Total Milk Per Month</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('/organization/return-view/farmers-produce')}}">
                            <div class="panel-footer">
                                <span style="color:purple" class="pull-left">View Details</span>
                                <span style="color:purple" class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                 <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-money fa-2x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$total_month}} </div>
                                    <div>Total Money per Month</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('/organization/return-view/farmers-produce')}}">
                            <div class="panel-footer">
                                <span style="color:purple" class="pull-left">View Details</span>
                                <span style="color:purple" class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-2x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"> {{$amount_today}}</div>
                                    <div>Amount Collected Today</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('/organization/return-view/farmers-produce') }}">
                            <div class="panel-footer">
                                <span style="color:purple" class="pull-left">View Details</span>
                                <span style="color:purple" class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <hr>

                <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-2x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$numb_famers}}</div>
                                    <div>Number of Farmers</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('/organization/return-view/farmers-details') }}">
                            <div class="panel-footer">
                                <span style="color:purple" class="pull-left">View Details</span>
                                <span style="color:purple" class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-2x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$No_userAdmin}} </div>
                                    <div>Number of User Admin</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('organization/return-view/admin-users')}}">
                            <div class="panel-footer">
                                <span style="color:purple" class="pull-left">View Details</span>
                                <span style="color:purple" class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                 <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-money fa-2x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$latestRate}} </div>
                                    <div>Milk Rate</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('/organization/return-view/farmers-produce')}}">
                            <div class="panel-footer">
                                <span style="color:purple" class="pull-left">View Details</span>
                                <span style="color:purple" class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-2x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"> {{$number_of_milk_record_today}}</div>
                                    <div>Number of Milk Records Today</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('/organization/return-view/farmers-produce') }}">
                            <div class="panel-footer">
                                <span style="color:purple" class="pull-left">View Details</span>
                                <span style="color:purple" class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- TABLE: PAYMENTS -->
        <!-- /.box -->

    </section>

@endsection