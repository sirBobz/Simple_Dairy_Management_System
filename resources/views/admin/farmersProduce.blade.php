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
               <table class="table" id="farmersProduce">
                    <thead>
                        <tr class = "success">
                            <th class="text-center">ID</th>
                            <th class="text-center">Farmer Name</th>
                            <th class="text-center">ID No</th>
                            <th class="text-center">Dairy Number</th>
                            <th class="text-center">Milk Weight</th>
                            <th class="text-center">Milk Rate</th>
                            <th class="text-center">Total Amount</th>
                            <th class="text-center">Milk Condition</th>
                            <th class="text-center">Created At</th>
                            <!-- <th class="text-center">Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                        <tr class="item{{$item->id}}">
                            <td class="text-center">{{$id ++}}</td>
                            <td class="text-center">{{$item->farmerName}}</td>
                            <td class="text-center">{{$item->farmer_ID}}</td>
                            <td class="text-center">{{$item->farmerDairyNum}}</td>
                            <td class="text-center">{{$item->milk_weight}}</td>
                            <td class="text-center">{{$item->milk_Rate}}</td>
                            <td class="text-center">{{$item->total_Amount}}</td>
                            <td class="text-center">{{$item->milk_condition}}</td>
                            <td class="text-center">{{$item->created_at}}</td>
                            <!-- <td class="text-center"><button class="edit-modal btn btn-info"
                                    data-info="{{$item->id}},{{$item->farmerName}},{{$item->farmer_ID}},{{$item->farmerDairyNum}},{{$item->milk_weight}},{{$item->milk_Rate}},{{$item->total_Amount}},{{$item->milk_condition}},{{$item->created_at}}">
                                    <span class="glyphicon glyphicon-edit"></span> Edit
                                </button>
                                <button class="delete-modal btn btn-danger"
                                    data-info="{{$item->id}},{{$item->farmerName}},{{$item->farmer_ID}},{{$item->farmerDairyNum}},{{$item->milk_weight}},{{$item->milk_Rate}},{{$item->total_Amount}},{{$item->milk_condition}},{{$item->created_at}}">
                                    <span class="glyphicon glyphicon-trash"></span> Delete
                                </button></td> -->
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