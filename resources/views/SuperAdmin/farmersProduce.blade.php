@extends('layouts.superadmin')



@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">

        <h1>Milk Records</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/organization/return-view/super-admin-dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Milk Records</li>
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
                    <!--  Initialize Table ID counter -->
         <?php $id = 1; ?>
            <!-- /.box-header -->
            <div class="box-body">
               <table class="table" id="farmersProduce">
                    <thead>
                        <tr class = "success">
                            <th class="text-center">ID</th>
                            <th class="text-center">Farmer Name</th>
                            <th class="text-center">ID No</th>
                            <th class="text-center">Dairy Number</th>
                            <th class="text-center">Milk Weight</th>
                            <th class="text-center">Milk Condition</th>
                            <th class="text-center">Total Milk Weight</th>
                            
                            <th class="text-center">Created At</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ProduceDetails as $item)
                        <tr class="item{{$item->id}}">
                            <td class="text-center">{{$id ++}}</td>
                            <td class="text-center">{{$item->name}}</td>
                            <td class="text-center">{{$item->farmer_ID}}</td>
                            <td class="text-center">{{$item->milk_weight}}</td>
                            <td class="text-center">{{$item->milk_weight}}</td>
                            <td class="text-center">{{$item->milk_condition}}</td>
                            <td class="text-center">{{$item->total_milk_weight}}</td>
                            
                            <td class="text-center">{{$item->created_at}}</td>
                            
                        </tr>
                        @endforeach
                        </tbody>
                </table>

                 <tr>           
                
                <!-- /.table-responsive -->
            </div>
                
            </div>
        </div>
    </section>
    

@endsection