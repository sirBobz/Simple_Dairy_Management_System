<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> Dairy Managent System</title>
    
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    

   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css">

   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

     <!-- date time range picker css-->
    <link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" rel="stylesheet"/>

    <!-- Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('css/skin-yellow-light.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>

<body class="hold-transition skin-yellow-light sidebar-mini">
<div class="wrapper">

    <header class="main-header">

        <!-- Logo -->
        <a href="{{ url('/') }}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            {{--<span class="logo-mini"><b>D</b>MN</span>--}}
            <!-- <span class="logo-mini"><img src="{{ asset('img/') }}" class="img-responsive" alt="User Image"></span> -->
            <!-- logo for regular state and mobile devices -->
            {{--<span class="logo-lg"><b>Dairy</b></span>--}}
            <!-- <span class="logo-lg"><img src="{{ asset('img/') }}" class="img-responsive" alt="User Image"></span> -->
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <!-- User Account: style can be found in dropdown.less -->
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    </ul>
                @else
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ asset('img/avatar.jpg') }}" class="user-image" alt="User Image">
                                <span class="hidden-xs">Welcome {{ Auth::user()->first_name }} {{ Auth::user()->second_name }}</span>
                            </a>

                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="{{ asset('img/avatar.jpg') }}" class="img-circle" alt="User Image">

                                    <p>
                                        {{ Auth::user()->first_name }} {{Auth::user()->second_name}}
                                        <small>Email: {{ Auth::user()->email }}</small>
                                    </p>
                                </li>

                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ url('/logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Sign out</a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                @endif
            </div>
        </nav>
    </header>

    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ asset('img/avatar.jpg') }}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->first_name }}</p>
                    <a href="{{ url('/organization/return-view/admin-dashboard') }}"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <li class="active treeview">
                    <a href="{{ url('/organization/return-view/super-admin-dashboard') }}">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                </li>
                <li class="treeview">
                    <a href="{{ url('/organization/return-view/super-admin/farmers-produce') }}">
                        <i class="fa fa-bar-chart"></i> <span> Milk Produce</span></a>
                </li>
                <li class="treeview">
                    <a href="{{ url('/organization/return-view/user-admin-details') }}">
                        <i class="fa fa-user"></i> <span> User Admin</span></a>
                </li>
             
               
                <li class="treeview">
                    <a href="{{ url('/organization/return-view/super-admin/users') }}">
                        <i class="fa fa-users"></i> <span>Admin Users</span></a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

        <div class="content-wrapper">

                @yield('content')

        </div>
           <footer class="site-footer">
                   <div class="text-center">
                     &copy;  {{date("Y") }}  &emsp; &emsp; Version 1.0.0
                   </div>
                   
           </footer>
            <!--footer end-->
</div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- DataTables -->
        <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

       <script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
       <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js"></script>
       <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
       <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
       <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
       <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
       <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>
   
        <script type="text/javascript">
            $(document).ready(function() {
            $('#farmersProduce').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
        } );
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
            $('#farmersDetails').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
        } );
        </script>

         <script type="text/javascript">
            $(document).ready(function() {
            $('#adminUsers').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
        } );
        </script>

        



        <!-- App scripts -->
        @stack('scripts')

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <script type="text/javascript">
        $(function() {
          $("#fromperiod").datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1,
            onClose: function(selectedDate) {
              $("#toperiod").datepicker("option", "minDate", selectedDate);
            }
          });
          $("#toperiod").datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1,
            onClose: function(selectedDate) {
              $("#fromperiod").datepicker("option", "maxDate", selectedDate);
            }
          });
        });
        </script>


        <!-- App scripts -->
        @stack('scripts')


</body>

</html>