@extends('layouts.admin')



@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">

        <h1>Milk Records</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('organization/return-view/admin-dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
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
                            <th class="text-center">ID Number</th>
                            <th class="text-center">Dairy Number</th>
                            <th class="text-center">Milk Weight</th>
                            <th class="text-center">Milk Rate</th>
                            <th class="text-center">Amount Payable</th>
                            <th class="text-center">Milk Condition</th>
                            <th class="text-center">Total Milk Weight</th>
                            <th class="text-center">Created At</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ProduceDetails as $item)
                        <tr class="item{{$item->id}}">
                            <td class="text-center">{{$id ++}}</td>
                            <td class="text-center">{{$item->name}}</td>
                            <td class="text-center">{{$item->farmer_ID}}</td>
                            <td class="text-center">{{$item->farmerDairyNum}}</td>
                            <td class="text-center">{{$item->milk_weight}}</td>
                            <td class="text-center">
                                          @php
                                          $Setting = App\Models\Setting::orderBy('created_at', 'desc')->firstOrFail();
                                          $latestRate = $Setting->milk_rate;
                                          @endphp
                                          {{$latestRate}} 
                            </td>
                            <td class="text-center">{{$latestRate * $item->milk_weight}}</td>
                            <td class="text-center">{{$item->milk_condition}}</td>
                            <td class="text-center">{{$item->total_milk_weight}}</td>
                            
                            <td class="text-center">{{$item->created_at}}</td>
                            <td class="text-center"><form action="delete-farmer-produce/{{$item->id}}" method='post'>
                            {{csrf_field()}}
                            <button type="submit" class="delete-modal btn btn-danger btn-sm"
                            onclick="return confirm('Do You Want To Delete {{$item->farmerName}} Record?');"
                            <span class="glyphicon glyphicon-trash"> Delete</span>   
                            </button></form>
                            </td>
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