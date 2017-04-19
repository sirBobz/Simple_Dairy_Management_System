@extends('layouts.farmer')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">

        <h1>Reports</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('organization/return-view/user-dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Reports</li>
        </ol>

    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-purple">
            <div class="box-header with-border">
                <h3 class="box-title">Reports</h3>

                <div class='picker col-lg-12 col-md-12 col-sm-12 col-xs-12 col-md-offset-2'>

                    <h4>Select Date Period To Download Reports</h4>
                    <br><br>

                    <form method="get" action="{{url('/organization/updateFarmersProduce')}}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-3 col-sm-3 col-xs-6">
                                <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                                    <label for="startdate">Start Date</label>
                                    <input name="from" type="text" class="form-control" id='fromperiod'  placeholder="Start Date" required
                                    @if ($errors->has('date'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-3 col-xs-6">
                            <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                                <label for="enddate">End Date</label>
                                <input name="to" type="text" class="form-control" id='toperiod'  placeholder="End Date" required
                                @if ($errors->has('date'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('date') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <input type="submit" class="btn btn-facebook btn-flat pull-right" value="Select Date Period">
                            </div>
                        </div>

                    </form>

                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </section>

@endsection