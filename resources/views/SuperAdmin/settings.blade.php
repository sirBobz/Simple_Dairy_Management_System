@extends('layouts.superadmin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">

        <h1>Settings</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/organization/return-view/super-admin-dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"> Settings</li>
        </ol>

    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-purple">
            <div class="box-header with-border">
                <h3 class="box-title"></h3>
                <button type="button" class="btn btn-facebook btn-flat btn-sm" data-toggle="modal" data-target="#addUser">Update Milk Rate</button>

                
                
                <!--  Initialize Table ID counter -->
         <?php $id = 1; ?>
            <!-- /.box-header -->
            <div class="box-body">
            
                <div class="table-responsive">
                    <table id="adminUsers" class="table table-striped table no-margin" cellspacing="0" width="100%">
                       <thead>
                         <tr class = "success">
                            <th> ID </th>
                            <th> Milk Rate </th>
                            
                            <th> Created At</th>
                            <th> Updated At</th>
                         </tr>
                       </thead>

                      <tbody>
                       
                            @foreach($SettingDetails as $data)
                                <tr>
                                    <td> {{$id ++}} </td>
                                    
                                    <td> {{$data->milk_rate}}</td>
                        
                                    <td> {{$data->created_at}} </td>
                                    <td> {{$data->updated_at}}</td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <!-- /.table-responsive -->
            </div>    
                
            </div>
        </div>
    </section>
    <!-- Admin User  -->
    <div class="container">

        <!-- Modal -->
        <div class="modal fade" id="addUser" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Update Milk Rate</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('register/new-milk-rate') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('milk_rate') ? ' has-error' : '' }}">
                            <label for="milk_rate" class="col-md-4 control-label"> Milk Rate</label>

                            <div class="col-md-6">
                                <input id="milk_rate" maxlength="3" type="number" class="form-control" name="milk_rate" value="{{ old('milk_rate') }}" required autofocus>

                                @if ($errors->has('milk_rate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('milk_rate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                                <div class="col-lg-6 col-md-8 col-sm-12 col-md-offset-4">
                                    <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-facebook btn-flat pull-right">
                                        Save
                                    </button>
                                </div>
                            </div>
                    </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
    

@endsection