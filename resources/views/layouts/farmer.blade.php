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

    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

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
                                        {{ Auth::user()->name }} {{Auth::user()->second_name}}
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
                    <a href="{{ url('/organization/return-view/user-dashboard') }}">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                </li>
                <li class="treeview">
                    <a href="{{ url('/organization/return-view/user-details') }}">
                        <i class="fa fa-university"></i> <span>Farmers Details</span></a>
                </li>
                <li class="treeview">
                    <a href="{{ url('/organization/return-view/produce-records') }}">
                        <i class="fa fa-money"></i> <span>Milk Records</span></a>
                </li>
                <li class="treeview">
                    <a href="{{ url('/organization/return-view/farmer-reports/select-by-date') }}">
                        <i class="fa fa-bar-chart"></i> <span>Reports</span></a>
                </li>
                <li class="treeview">
                    <a href="{{ url('/organization/return-view/farmer-users') }}">
                        <i class="fa fa-users"></i> <span>Users</span></a>
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


<!-- jQuery 2.2.3 -->
<script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('plugins/fastclick/fastclick.js') }}"></script>
<!-- Main App -->
<script src="{{ asset('js/app.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- SlimScroll 1.3.0 -->
<script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- ChartJS 1.0.1 -->
<script src="{{ asset('plugins/chartjs/Chart.min.js') }}"></script>
<!-- Main dashboard demo -->
<script src="{{ asset('js/dashboard.js') }}"></script>
<!-- Main for demo purposes -->
<script src="{{ asset('js/demo.js') }}"></script>

<!-- Date time range picker js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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

</body>

</html>