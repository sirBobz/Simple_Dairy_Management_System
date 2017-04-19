@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">

        <h1>Milk Records</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('organization/return-view/admin-dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Milk Records</li>
        </ol>

    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-purple">
            <div class="box-header with-border">
                <h3 class="box-title">Reports</h3>
                    <!--  Initialize Table ID counter -->
         <?php $id = 1; ?>
            <!-- /.box-header -->
            <div class="box-body">
            
                <div class="table-responsive">
                    <table id="" class="table table-striped table no-margin" cellspacing="0" width="100%">
                       <thead>
                         <tr>
                            <th> ID </th>
                            <th> Name </th>
                            <th> ID No </th>
                            <th> Dairy Number</th>
                            <th> Milk Weight</th>
                            <th> Milk Rate</th>
                            <th> Total Amount</th>
                            <th> Milk Condition</th>
                            <th> Created At</th>
                         </tr>
                       </thead>

                      <tbody>
                        <tr>
                            @foreach($farmersProduce as $user)
                                <tr>
                                    <td> {{$id ++}} </td>
                                    <td> {{$user->farmerName}}</td>
                                    <td> {{$user->farmer_ID}}</td>
                                    <td> {{$user->farmerDairyNum}}</td>
                                    <td> {{$user->milk_weight}}</td>
                                     <td>{{$user->milk_Rate}} </td>
                                    <td> {{$user->total_Amount}}</td>
                                    <td> {{$user->milk_condition}}</td>
                                    <td> {{$user->created_at}} </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="pagination"> {{ $farmersProduce->links() }} </div>
                </div>
                <!-- /.table-responsive -->
            </div>
                
            </div>
        </div>
    </section>
    

@endsection