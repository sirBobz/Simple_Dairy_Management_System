@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">

        <h1>Farmer Details</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('organization/return-view/admin-dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Farmer Details</li>
        </ol>

        <!-- Congrats message -->
        <div class="container">
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>

    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-purple">
            <div class="box-header with-border">
                <h3 class="box-title"></h3>
                <button type="button" class="btn btn-facebook btn-flat btn-sm" data-toggle="modal" data-target="#addUser"><span class="glyphicon glyphicon-user"></span> Add Farmer</button>

                    <!-- /.box-header -->
                    <?php $id = 1; ?>
                    <div class="box-body">
                    
                        <div class="table-responsive">
                  
                            <table id="farmersDetails" class="table table-striped table no-margin" cellspacing="0" width="100%">
                               <thead>
                                 <tr class = "success">
                                    <th class="text-center"> Id </th>
                                    <th class="text-center"> Name </th>
                                    <th class="text-center"> Gender </th>
                                    <th class="text-center"> Email</th>
                                    <th class="text-center"> ID Number</th>
                                    <th class="text-center"> Address</th>
                                    <th class="text-center"> Dairy Number</th>
                                    <th class="text-center"> Total Milk</th>
                                    <th class="text-center"> Created At</th>
                                    <th class="text-center"> Action</th>
                                </tr>
                               </thead>

                              <tbody>
                               
                                    @foreach($usersDetails as $user)
                                        <tr class="user{{$user->id}}">
                                            <td class="text-center"> {{$id ++}} </td>
                                            <td class="text-center">
                                            @php 
                                               $userId = $user->user_id;
                                               $name = App\Models\User::where('id', '=',  $userId)->firstOrFail();
                                               $first = $name->first_name; 
                                               $second = $name->second_name; 
                                               $full = "$first $second";
                                            @endphp 
                                              {{$full}}</td>
                                            <td class="text-center"> 
                                            @php 
                                                $det = App\Models\User::where('id', '=',  $userId)->firstOrFail();
                                                $gender = $det->gender;  
                                            @endphp
                                             {{$gender}}</td>
                                            <td class="text-center">
                                            @php 
                                                $det = App\Models\User::where('id', '=',  $userId)->firstOrFail();
                                                $email = $det->email;  
                                             @endphp
                                              {{$email}} </td>
                                            <td class="text-center"> {{$user->farmer_ID}}</td>
                                            <td class="text-center"> {{$user->box_number}} {{$user->postal_town}}</td>
                                            <td class="text-center"> {{$user->farmerDairyNum}}</td>
                                            <td class="text-center"> {{$user->total_milk_weight}}</td>         
                                            <td class="text-center"> {{$user->created_at}} </td>
                                            <td class="text-center"> <button type="button" class="btn btn-facebook btn-flat btn-sm" data-toggle="modal"
                                data-target="#setAccountModal{{$user->id}}"><span class="glyphicon glyphicon-edit"></span> Update
                                    </button>
                                    <!-- Account Set Up Modal -->
                    <div class="modal fade" id="setAccountModal{{$user->id}}" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Milk for No. {{$user->farmerDairyNum}}</h4>
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal" role="form" method="POST"
                                          action="{{ url('/organization/produce-details') }}">
                                        {{ csrf_field() }}
                                         
                                        <div class="form-group{{ $errors->has('milk_weight') ? ' has-error' : '' }}">
                                            <label for="milk_weight" class="col-md-4 control-label">Weight</label>

                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <input id="milk_weight" maxlength="3" type="number" placeholder="eg: 100" class="form-control"
                                                       name="milk_weight" value="{{ old('milk_weight') }}"
                                                       title="Please add milk weight" required autofocus>

                                                @if ($errors->has('milk_weight'))
                                                    <span class="help-block">
                                                                    <strong>{{ $errors->first('milk_weight') }}</strong>
                                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('milk_condition') ? ' has-error' : '' }}">
                                            <label for="milk_condition" class="col-md-4 control-label">Condition</label>

                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <input id="milk_condition" maxlength="20" type="text" placeholder="eg: Okay" class="form-control"
                                                       name="milk_condition" value="{{ old('milk_condition') }}"
                                                       title="Please indicate milk Condition" required autofocus>

                                                @if ($errors->has('milk_condition'))
                                                    <span class="help-block">
                                                                    <strong>{{ $errors->first('milk_condition') }}</strong>
                                                                </span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <input type="hidden" class="form-control" name="user_id" value="{{$user->user_id}}"
                                                       required autofocus>

                                                @if ($errors->has('user_id'))
                                                    <span class="help-block">
                                                                    <strong>{{ $errors->first('user_id') }}</strong>
                                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <br/>
                                        <div class="form-group">
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-md-offset-4">
                                                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">
                                                    Close
                                                </button>
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
                    </td>
                                            
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
    <!-- Add farmer  -->
    <div class="container">

        <!-- Modal -->
        <div class="modal fade" id="addUser" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Farmer</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register/new-farmer') }}">
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


                        <input type="hidden" name="user_type" value="userMilkFarmer">
                          
                        <div class="form-group{{ $errors->has('farmer_ID') ? ' has-error' : '' }}">
                            <label for="farmer_ID" class="col-md-4 control-label">ID Number</label>
                            <div class="col-md-6">
                                <input id="farmer_ID" maxlength="10" type="number" class="form-control" name="farmer_ID" value="{{ old('farmer_ID') }}" required autofocus>

                                @if ($errors->has('farmer_ID'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('farmer_ID') }}</strong>
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
                                <input id="email" maxlength="50" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('farmerDairyNum') ? ' has-error' : '' }}">
                            <label for="farmerDairyNum" class="col-md-4 control-label">Dairy Number</label>

                            <div class="col-md-6">
                                <input id="farmerDairyNum" maxlength="15" type="number" class="form-control" name="farmerDairyNum" value="{{ old('farmerDairyNum') }}" required autofocus>

                                @if ($errors->has('farmerDairyNum'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('farmerDairyNum') }}</strong>
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