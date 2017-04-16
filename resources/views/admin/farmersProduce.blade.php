@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Dashboard</h1>
        <ol class="breadcrumb">
            <li class="active">Farmers Produce</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container">

         <!--  Initialize Table ID counter -->
         <?php $id = 1; ?>
            <!-- /.box-header -->
            <div class="box-body">
            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#addUser">Add Admin</button>
                <div class="table-responsive">
                    <table id="" class="table table-striped table no-margin" cellspacing="0" width="100%">
                       <thead>
                         <tr>
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
                        <tr>
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

                    <div class="pagination"> {{ $usersDetails->links() }} </div>
                </div>
                <!-- /.table-responsive -->
            </div>
      </div>
    </section>
       

@endsection