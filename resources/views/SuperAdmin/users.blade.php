@extends('layouts.superadmin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">

        <h1>Admin Users</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/organization/return-view/super-admin-dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Admin Users</li>
        </ol>

    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-purple">
            <div class="box-header with-border">
                <h3 class="box-title"></h3>
                <button type="button" class="btn btn-facebook btn-flat btn-sm" data-toggle="modal" data-target="#addUser">Add Admin</button>

                
                
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

                        <input type="hidden" name="user_type" value="superAdmin" required="superAdmin">  

                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="gender" class="col-md-4 control-label">Gender</label>

                            <div class="col-md-6">
                               <select required="required" name="gender" id="gender" class="form-control" title="Please set the gender">
                                  <option value="">Select the Gender</option>
                                   <option value="Male">Male</option>
                                   <option value="Female">Female</option>
                                   <option value="Other">Other</option>
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