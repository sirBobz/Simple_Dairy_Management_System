@extends('layouts.farmer')

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
                                    <div class="huge"> </div>
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
                                    <i class="fa fa-user fa-2x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"> </div>
                                    <div>Total Number of Milk</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('dibon-organization/return-view/users')}}">
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
                                    <i class="fa fa-support fa-2x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"> </div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('dibon-organization/return-view/settings')}}">
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
                                    <i class="fa fa-user fa-2x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
                                    <div>Last Login</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('/dibon-organization/return-view/users') }}">
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

        <!-- TABLE: PAYMENTS -->
        
        
        <!-- /.box -->

    </section>

@endsection