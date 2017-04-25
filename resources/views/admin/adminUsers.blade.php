@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">

        <h1>Admin Users</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('organization/return-view/admin-dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Admin Users</li>
        </ol>

    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-purple">
            <div class="box-header with-border">
                <h3 class="box-title"></h3>
                <button type="button" class="btn btn-facebook btn-flat btn-sm" data-toggle="modal" data-target="#addUser">Add Admin</button>

                <a href="change-password" role="button" class="btn btn-facebook btn-flat btn-sm pull-right"><span class="glyphicon glyphicon-edit"> Password</a>
                
                <!--  Initialize Table ID counter -->
         <?php $id = 1; ?>
            <!-- /.box-header -->
            <div class="box-body">
            
                <div class="table-responsive">
                    <table id="adminUsers" class="table table-striped table no-margin" cellspacing="0" width="100%">
                       <thead>
                         <tr class = "success">
                            <th> ID </th>
                            <th> Name </th>
                            <th> Gender</th>
                            <th> Email</th>
                            <th> ID Number</th>
                            <th> Po Box</th>
                            <th> Total Milk</th>
                            <th> Status</th>
                            <th> Created At</th>
                            <th> Updated At</th>
                         </tr>
                       </thead>

                      <tbody>
                       
                            @foreach($usersDetails as $user)
                                <tr>
                                    <td> {{$id ++}} </td>
                                    <td> {{$user->first_name}} {{$user->second_name}} {{$user->third_name}}</td>
                                    <td> {{$user->gender}}</td>
                                     <td>{{$user->email}} </td>
                                    <td> {{$user->id_number}}</td>
                                    <td> {{$user->box_number}} {{$user->zip_code}} {{$user->postal_town}}</td>
                                    <td> {{$user->total_milk}}</td>
                                    <td> <?php if ($user->verified == 0)
                                                   { echo "Inactive";}
                                               else { echo "Active";} ?> 
                                    </td>        
                                    <td> {{$user->created_at}} </td>
                                    <td> {{$user->updated_at}}</td>
                                    
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
                        <h4 class="modal-title">Add User</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name" class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input id="first_name" maxlength="15" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('second_name') ? ' has-error' : '' }}">
                            <label for="second_name" class="col-md-4 control-label">Second Name</label>

                            <div class="col-md-6">
                                <input id="second_name" maxlength="15" type="text" class="form-control" name="second_name" value="{{ old('second_name') }}" required autofocus>

                                @if ($errors->has('second_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('second_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('third_name') ? ' has-error' : '' }}">
                            <label for="third_name" class="col-md-4 control-label">Last Name</label>

                            <div class="col-md-6">
                                <input id="third_name" maxlength="15" type="text" class="form-control" name="third_name" value="{{ old('third_name') }}" autofocus>

                                @if ($errors->has('third_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('third_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <input type="hidden" name="user_type" value="userAdmin">  

                        <div class="form-group{{ $errors->has('id_number') ? ' has-error' : '' }}">
                            <label for="id_number" class="col-md-4 control-label">ID Number</label>

                            <div class="col-md-6">
                                <input id="id_number" maxlength="10" type="number" class="form-control" name="id_number" value="{{ old('id_number') }}" required autofocus>

                                @if ($errors->has('id_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="gender" class="col-md-4 control-label">Gender</label>

                            <div class="col-md-6">
                               <select required="required" name="gender" id="gender" class="form-control" title="Please set the gender">
                                  <option value="">Select the Gender</option>
                                   <option value="Male">Male</option>
                                   <option value="Female">Female</option>
                               </select>

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" maxlength="30" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('farmer_dairy_no') ? ' has-error' : '' }}">
                            <label for="farmer_dairy_no" class="col-md-4 control-label">Dairy Number</label>

                            <div class="col-md-6">
                                <input id="farmer_dairy_no" maxlength="15" type="number" class="form-control" name="farmer_dairy_no" value="{{ old('farmer_dairy_no') }}" required autofocus>

                                @if ($errors->has('farmer_dairy_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('farmer_dairy_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    
                        <div class="form-group{{ $errors->has('box_number') ? ' has-error' : '' }}">
                            <label for="box_number" class="col-md-4 control-label">Box Number</label>

                            <div class="col-md-6">
                                <input id="box_number" maxlength="15" type="number" class="form-control" name="box_number" value="{{ old('box_number') }}"  autofocus>

                                @if ($errors->has('box_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('box_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('zip_code') ? ' has-error' : '' }}">
                            <label for="zip_code" class="col-md-4 control-label">Zip Code</label>

                            <div class="col-md-6">
                                <input id="zip_code" maxlength="10" type="number" class="form-control" name="zip_code" value="{{ old('zip_code') }}"  autofocus>

                                @if ($errors->has('zip_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('zip_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('postal_town') ? ' has-error' : '' }}">
                            <label for="postal_town" class="col-md-4 control-label">Location</label>

                            <div class="col-md-6">
                                <input id="postal_town" maxlength="15" type="text" class="form-control" name="postal_town" value="{{ old('postal_town') }}"  autofocus>

                                @if ($errors->has('postal_town'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('postal_town') }}</strong>
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