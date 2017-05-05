@extends('layouts.farmer')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">

        <h1>My Produce</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('organization/return-view/user-dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">My Produce</li>
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
                    <table id="myProduce" class="table table-striped table no-margin" cellspacing="0" width="100%">
                       <thead>
                         <tr class = "success">
                            <th class="text-center"> ID </th>
                            <th class="text-center"> Milk ID</th>
                            <th class="text-center"> Milk Weight</th>
                            <th class="text-center"> Milk Rate</th>
                            <th class="text-center"> Amount Payable</th>
                            <th class="text-center"> Milk Condition</th>
                            <th class="text-center"> Created At</th>
                         </tr>
                       </thead>

                      <tbody>
                       
                            @foreach($farmersProduce as $user)
                                <tr>
                                    <td class="text-center"> {{$id ++}} </td>
                                    <td class="text-center"> {{$user->farmerDairyNum}}</td>
                                    <td class="text-center"> {{$user->milk_weight}}</td>
                                    <td class="text-center">  
                                          @php
                                          $Setting = App\Models\Setting::orderBy('created_at', 'desc')->firstOrFail();
                                          $latestRate = $Setting->milk_rate;
                                          @endphp
                                          {{$latestRate}} 
                                    </td>
                                    <td class="text-center"> 
                                    {{$latestRate * $user->milk_weight}}

                                    </td>
                                    <td class="text-center"> {{$user->milk_condition}}</td>
                                    <td class="text-center"> {{$user->created_at}} </td>
                                    
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
    

@endsection