<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themicon.co/theme/angle/v4.0/static-html/app/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 20 Nov 2018 12:40:10 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Bazimya saphani">
    <meta name="keywords" content="app, responsive, jquery, bootstrap, dashboard, admin">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets') }}/product/logo.png'">
    <title>Internshep and Project management </title>

    @yield('title')

    <!-- =============== VENDOR STYLES ===============-->
    <!-- FONT AWESOME-->
    <link rel="stylesheet" href="{{ asset('assets') }}/admin/vendor/@fortawesome/fontawesome-free-webfonts/css/fa-brands.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/admin/vendor/@fortawesome/fontawesome-free-webfonts/css/fa-regular.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/admin/vendor/@fortawesome/fontawesome-free-webfonts/css/fa-solid.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/admin/vendor/@fortawesome/fontawesome-free-webfonts/css/fontawesome.css">
    <!-- SIMPLE LINE ICONS-->
    <link rel="stylesheet" href="{{ asset('assets') }}/admin/vendor/simple-line-icons/css/simple-line-icons.css">
    <!-- ANIMATE.CSS-->
    <link rel="stylesheet" href="{{ asset('assets') }}/admin/vendor/animate.css/animate.css">
    <!-- WHIRL (spinners)-->
    <link rel="stylesheet" href="{{ asset('assets') }}/admin/vendor/whirl/dist/whirl.css">
    <!-- =============== PAGE VENDOR STYLES ===============-->
    <!-- WEATHER ICONS-->
    <link rel="stylesheet" href="{{ asset('assets') }}/admin/vendor/weather-icons/css/weather-icons.css">
    <!-- =============== BOOTSTRAP STYLES ===============-->
    <link rel="stylesheet" href="{{ asset('assets') }}/admin/css/bootstrap.css" id="bscss">

    <link rel="stylesheet" href="{{ asset('assets') }}/admin/css/select2.css" >

    <!-- Datatables-->
    <link rel="stylesheet" href="{{ asset('assets') }}/admin/vendor/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/admin/vendor/datatables.net-keytable-bs/css/keyTable.bootstrap.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/admin/vendor/datatables.net-responsive-bs/css/responsive.bootstrap.css">
    <!-- =============== BOOTSTRAP STYLES ===============-->
    <!-- Dropzone-->
    <link rel="stylesheet" href="{{ asset('assets') }}/admin/vendor/dropzone/dist/basic.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/admin/vendor/dropzone/dist/dropzone.css">

    <!-- =============== APP STYLES ===============-->
    <link rel="stylesheet" href="{{ asset('assets') }}/admin/css/app.css" id="maincss">
    <link rel="stylesheet" href="{{ asset('assets') }}/admin/css/alertbuton.css" id="maincss">

    {{-- <link rel="stylesheet" href="{{ asset('assets') }}/admin/css/summernote.css')}}" id="maincss"> --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
        button[data-name=resizedDataImage] {
            position: relative;
            overflow: hidden;
        }

        button[data-name=resizedDataImage] input {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            opacity: 0;
            font-size: 200px;
            max-width: 100%;
            -ms-filter: 'alpha(opacity=0)';
            direction: ltr;
            cursor: pointer;
        }

    </style>

</head>

<body>
    <div class="wrapper">
        <!-- top navbar-->
        <header class="topnavbar-wrapper">
            <!-- START Top Navbar-->
            <nav class="navbar topnavbar">
                <!-- START navbar header-->
                <div class="navbar-header">
                    <a class="navbar-brand" href="#/">
                        <div class="brand-logo">
                            <img class="img-fluid" src="{{ asset('assets') }}/product/logobg.png" alt="App Logo">
                        </div>
                        <div class="brand-logo-collapsed">
                            <img class="img-fluid" src="{{ asset('assets') }}/product/logobg.png" alt="App Logo">
                        </div>
                    </a>
                </div>
                <!-- END navbar header-->
                <!-- START Left navbar-->
                <ul class="navbar-nav mr-auto flex-row">
                    <li class="nav-item">
                        <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                        <a class="nav-link d-none d-md-block d-lg-block d-xl-block" href="#" data-trigger-resize="" data-toggle-state="aside-collapsed">
                            <em class="fas fa-bars"></em>
                        </a>
                        <!-- Button to show/hide the sidebar on mobile. Visible on mobile only.-->
                        <a class="nav-link sidebar-toggle d-md-none" href="#" data-toggle-state="aside-toggled" data-no-persist="true">
                            <em class="fas fa-bars"></em>
                        </a>
                    </li>
                    <!-- START User avatar toggle-->
                    <li class="nav-item d-none d-md-block">
                        <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                        <a class="nav-link" id="user-block-toggle" href="#user-block" data-toggle="collapse">
                            <em class="icon-user"></em>
                        </a>
                    </li>
                    <!-- END User avatar toggle-->
                    <!-- START lock screen-->
                    <li class="nav-item d-none d-md-block">
                        <a class="nav-link" title="Logout" href="{{ route('logout') }}" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                            <em class="icon-lock"></em> {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>





                    <!-- END lock screen-->
                </ul>
                <!-- END Left navbar-->
                <!-- START Right Navbar-->
                <ul class="navbar-nav flex-row">
                    <!-- Search icon-->
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-search-open="">
                            <em class="icon-magnifier"></em>
                        </a>
                    </li>
                    <!-- Fullscreen (only desktops)-->
                    <li class="nav-item d-none d-md-block">
                        <a class="nav-link" href="#" data-toggle-fullscreen="">
                            <em class="fas fa-expand"></em>
                        </a>
                    </li>
                    <!-- START Alert menu-->
                    <li class="nav-item dropdown dropdown-list">
                        <a class="nav-link  dropdown-toggle-nocaret" href="/viewprojectsented">
                            <em class="icon-bell"></em>
                            {{-- <span class="badge badge-danger">{!!$selectunreaded!!}</span> --}}
                        </a>
                        <!-- START Dropdown menu-->
                   
                        <!-- END Dropdown menu-->
                    </li>
                    <!-- END Alert menu-->
                    <!-- START Offsidebar button-->
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle-state="offsidebar-open" data-no-persist="true">
                            <em class="icon-notebook"></em>
                        </a>
                    </li>
                    <!-- END Offsidebar menu-->
                </ul>
               
            </nav>
            <!-- END Top Navbar-->
        </header>
        <!-- sidebar-->
        <aside class="aside-container" style="background:#3dc0e8 !important">
            <!-- START Sidebar (left)-->
            <div class="aside-inner">
                <nav class="sidebar" data-sidebar-anyclick-close="" style="background:#3dc0e8 !important;color:#fff !important">
                    <!-- START sidebar nav-->
                    <ul class="sidebar-nav">
                        <!-- START user info-->
                        <li class="has-user-block" style="color:#fff !important">
                            <div class="collapse" id="user-block">
                                <div class="item user-block">
                                    <!-- User picture-->
                                    <div class="user-block-picture">
                                        <div class="user-block-status">
                                            <img class="img-thumbnail rounded-circle" src="{{ asset('/assets/home/img/apple-touch-icon.png')}}" alt="Avatar" width="60" height="60">
                                            <div class="circle bg-success circle-lg"></div>
                                        </div>
                                    </div>
                                    <!-- Name and Job-->
                                    <div class="user-block-info">
                                        <span class="user-block-name">{{Auth::user()->name}}</span>
                                        {{-- <span class="user-block-role">Designer</span> --}}
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- END user info-->
                        <!-- Iterates over all sidebar items-->



                        <li class=" ">
                            <a href="/home" title="Widgets">
                                <span data-localize="sidebar.nav.WIDGETS"></span>
                            </a>
                        </li>
                        {{-- doropdown  in to create lore and pamissinon --}}

                        <li class="">
                            <a href="#dashboard" title="Dasboard" data-toggle="collapse">
                                <em class="icon-doc" style="color:#fff !important"></em>
                                <span data-localize="sidebar.nav.pages.PAGES" style="color:#fff !important">Dasboard</span>
                            </a>
                            <ul class="sidebar-nav sidebar-subnav collapse" id="dashboard" style="color:#fff !important">
                                <li class="sidebar-subnav-header">Dashboard</li>
                                <li class=" ">
                                    <a href="{{ asset('/home') }}" title="Dashboard">
                                        <span data-localize="sidebar.nav.pages.LOGIN">Dashboard</span>
                                    </a>
                                </li>
                                @can('user-create')
                                <li class=" ">
                                    <a href="{{ route('users.create') }}" title="New User">
                                        <span data-localize="sidebar.nav.pages.LOGIN">New User</span>
                                    </a>
                                </li>
                                @endcan
                                @can('user-create')
                                <li class=" ">
                                    <a href="{{ route('users.index') }}" title="Users">
                                        <span data-localize="sidebar.nav.pages.LOGIN">Users</span>
                                    </a>
                                </li>
                               
                               
                                @endcan
                                @can('department-update')
                                <li class=" ">
                                    <a href="{{ route('departments.create') }}" title="New Department">
                                        <span data-localize="sidebar.nav.pages.LOGIN">New Department</span>
                                    </a>
                                </li>
                              

                                @endcan
                            </ul>
                            
                        </li>

                        {{-- end of the dashord part --}}
                        <li class="">
                            <a href="#companies" title="Companies" data-toggle="collapse">
                                <em class="icon-organization" style="color:#fff !important"></em>
                                <span data-localize="sidebar.nav.pages.COMPANIES" style="color:#fff !important">Companies</span>
                            </a>
                            <ul class="sidebar-nav sidebar-subnav collapse" id="companies">
                                <li class="sidebar-subnav-header">Companies</li>
                                <li class="">
                                    <a href="{{ route('companies.index') }}" title="All Companies">
                                        <span data-localize="sidebar.nav.pages.ALL_COMPANIES">All Companies</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{ route('companies.create') }}" title="New Company">
                                        <span data-localize="sidebar.nav.pages.NEW_COMPANY">New Company</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                       
                        {{-- doropdown  in to create lore and pamissinon --}}
                        @can('privillage-view')

                        <li class="">
                            <a href="#privilage" title="Privilage" data-toggle="collapse">
                                <em class="icon-chemistry" style="color:#fff !important"></em>
                                <span data-localize="sidebar.nav.pages.PAGES" style="color:#fff !important">Privilage</span>
                            </a>
                            <ul class="sidebar-nav sidebar-subnav collapse" id="privilage">
                                <li class="sidebar-subnav-header">Privilage</li>
                                <li class=" ">
                                    <a href="/newrole" title="New Role">
                                        <span data-localize="sidebar.nav.pages.LOGIN">New Role</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="/setting" title="permission">
                                        <span>setting</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endcan
                        <li class="">
                            <a href="#indexClientManagement" title="Client Management" data-toggle="collapse">
                                <em class="icon-user" style="color:#fff !important"></em>
                                <span data-localize="sidebar.nav.pages.CLIENT_MANAGEMENT" style="color:#fff !important">Client Management</span>
                            </a>
                            <ul class="sidebar-nav sidebar-subnav collapse" id="indexClientManagement">
                                <li class="sidebar-subnav-header">Client Management</li>
                                <li class=" ">
                                    <a href="{{ route('clients.index') }}" title="View Clients">
                                        <span data-localize="sidebar.nav.pages.VIEW_CLIENTS">View Clients</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="{{ route('clients.create') }}" title="Add New Client">
                                        <span data-localize="sidebar.nav.pages.ADD_NEW_CLIENT">Add New Client</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="">
                            <a href="#indexBilling" title="Billing" data-toggle="collapse">
                                <em class="icon-wallet" style="color:#fff !important"></em>
                                <span data-localize="sidebar.nav.pages.BILLING" style="color:#fff !important">Billing</span>
                            </a>
                            <ul class="sidebar-nav sidebar-subnav collapse" id="indexBilling">
                                <li class="sidebar-subnav-header" >Billing</li>
                                <li class=" ">
                                    <a href="{{ route('billing.createMonthly') }}" title="Create Monthly Subscription" >
                                        <span data-localize="sidebar.nav.pages.MONTHLY_SUBSCRIPTION">Monthly Subscription</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="{{ route('billing.createYearly') }}" title="Create Yearly Subscription" >
                                        <span data-localize="sidebar.nav.pages.YEARLY_SUBSCRIPTION">Yearly Subscription</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="">
                            <a href="#indexComplaints" title="Complaints" data-toggle="collapse">
                                <em class="icon-exclamation" style="color:#fff !important"></em>
                                <span data-localize="sidebar.nav.pages.COMPLAINTS" style="color:#fff !important">Complaints</span>
                            </a>
                            <ul class="sidebar-nav sidebar-subnav collapse" id="indexComplaints">
                                <li class="sidebar-subnav-header">Complaints</li>
                                <li class=" ">
                                    <a href="{{ route('complaints.index', ['client' => $client->id ?? 1]) }}" title="View Complaints">
                                        <span data-localize="sidebar.nav.pages.VIEW_COMPLAINTS">View Complaints</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="{{ route('complaints.create', ['client' => $client->id ?? 1]) }}" title="Register Complaint">
                                        <span data-localize="sidebar.nav.pages.REGISTER_COMPLAINT">Register Complaint</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="">
                            <a href="#indexReports" title="Reports" data-toggle="collapse">
                                <em class="icon-doc" style="color:#fff !important"></em>
                                <span data-localize="sidebar.nav.pages.REPORTS" style="color:#fff !important">Reports</span>
                            </a>
                            <ul class="sidebar-nav sidebar-subnav collapse" id="indexReports">
                                <li class="sidebar-subnav-header" >Reports</li>
                                <li class=" ">
                                    <a href="{{ route('reports.index') }}" >View Reports</a>
                                </li>
                                <li class=" ">
                                    <a href="{{ route('reports.create') }}" title="Create Report" >
                                        <span data-localize="sidebar.nav.pages.CREATE_REPORT">Create Report</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                       
                        <li class="">
                            <a href="#indexSales" title="Sales" data-toggle="collapse">
                                <em class="icon-basket" style="color:#fff !important"></em>
                                <span data-localize="sidebar.nav.pages.SALES" style="color:#fff !important">Sales</span>
                            </a>
                            <ul class="sidebar-nav sidebar-subnav collapse" id="indexSales">
                                <li class="sidebar-subnav-header">Sales</li>
                                <li class="">
                                    <a href="{{ route('sales.index') }}" title="View All Sales">
                                        <span data-localize="sidebar.nav.pages.VIEW_SALES">View Sales</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{ route('sales.create') }}" title="Add New Sale">
                                        <span data-localize="sidebar.nav.pages.ADD_NEW_SALE">Add New Sale</span>
                                    </a>
                                </li>
                                <!-- Conditional links based on whether $sale is available -->
                                @isset($sale)
                                    <li class="">
                                        <a href="{{ route('sales.show', $sale->id) }}" title="View Sale">
                                            <span data-localize="sidebar.nav.pages.VIEW_SALE">View Sale</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="{{ route('sales.edit', $sale->id) }}" title="Edit Sale">
                                            <span data-localize="sidebar.nav.pages.EDIT_SALE">Edit Sale</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="{{ route('sales.invoice', $sale->id) }}" title="Download Invoice">
                                            <span data-localize="sidebar.nav.pages.DOWNLOAD_INVOICE">Download Invoice</span>
                                        </a>
                                    </li>
                                @endisset
                            </ul>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('stock.index') }}"  style="color:#fff !important">
                                <i class="fas fa-boxes"></i>
                                <span>Stock Management</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('stock.sold') }}"  style="color:#fff !important">
                                <i class="fas fa-box-open"></i>
                                <span>Sold Stock</span>
                            </a>
                        </li>
                        
                        <li class="">
                            <a href="#indexTasks" title="Tasks" data-toggle="collapse"  style="color:#fff !important">
                                <em class="icon-list"></em>
                                <span data-localize="sidebar.nav.pages.TASKS">Tasks</span>
                            </a>
                            <ul class="sidebar-nav sidebar-subnav collapse" id="indexTasks">
                                <li class="sidebar-subnav-header" >Tasks</li>
                                <li class=" ">
                                    <a href="{{ route('tasks.index', ['client' => $client->id ?? 1]) }}" title="View Tasks" style="color:#fff !important">
                                        <span data-localize="sidebar.nav.pages.VIEW_TASKS">View Tasks</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="{{ route('tasks.create', ['client' => $client->id ?? 1]) }}" title="Add Task" style="color:#fff !important">
                                        <span data-localize="sidebar.nav.pages.ADD_TASK">Add Task</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    
                    </ul>
                    <!-- END sidebar nav-->
                </nav>

            </div>
            <!-- END Sidebar (left)-->
        </aside>
        <!-- offsidebar-->

        <div class="container-fluid">
            @include('sweetalert::alert')
            @if ($message = Session::get('message'))
            <div class="alert alert-success text-center">
                <ul>
                    {{ $message }}
                </ul>
            </div>
            @endif
            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="container">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        </div >
       
            @yield('content')
           
        </div>
        <!-- Main section-->
        <!-- Page footer-->
        <footer class="footer-container">
            <span>&copy; CRM BY YANJYE LIMITED</span>
        </footer>
    </div>
    <!-- =============== VENDOR SCRIPTS ===============-->
    <!-- MODERNIZR-->
    <script src="{{ asset('assets') }}/admin/vendor/modernizr/modernizr.custom.js"></script>
    <!-- JQUERY-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script src="{{ asset('assets') }}/admin/vendor/jquery/dist/jquery.js"></script> --}}
    <!-- BOOTSTRAP-->
    <script src="{{ asset('assets') }}/admin/vendor/popper.js/dist/umd/popper.js"></script>
    <script src="{{ asset('assets') }}/admin/vendor/bootstrap/dist/js/bootstrap.js"></script>
    <!-- CHART.JS-->
    <script src="{{ asset('assets') }}/admin/vendor/chart.js/dist/Chart.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    {{-- <script src="{{ asset('assets') }}/admin/js/summernote.js"></script> --}}


    <!-- STORAGE API-->
    <script src="{{ asset('assets') }}/admin/vendor/js-storage/js.storage.js"></script>
    <!-- JQUERY EASING-->
    <script src="{{ asset('assets') }}/admin/vendor/jquery.easing/jquery.easing.js"></script>
    <!-- ANIMO-->
    <script src="{{ asset('assets') }}/admin/vendor/animo/animo.js"></script>
    <!-- SCREENFULL-->
    <script src="{{ asset('assets') }}/admin/vendor/screenfull/dist/screenfull.js"></script>
    <!-- LOCALIZE-->
    <script src="{{ asset('assets') }}/admin/vendor/jquery-localize/dist/jquery.localize.js"></script>
    <!-- =============== PAGE VENDOR SCRIPTS ===============-->
    <!-- SLIMSCROLL-->
    <script src="{{ asset('assets') }}/admin/vendor/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- SPARKLINE-->
    <script src="{{ asset('assets') }}/admin/vendor/jquery-sparkline/jquery.sparkline.js"></script>
    <!-- FLOT CHART-->
    <script src="{{ asset('assets') }}/admin/vendor/flot/jquery.flot.js"></script>
    <script src="{{ asset('assets') }}/admin/vendor/jquery.flot.tooltip/js/jquery.flot.tooltip.js"></script>
    <script src="{{ asset('assets') }}/admin/vendor/flot/jquery.flot.resize.js"></script>
    <script src="{{ asset('assets') }}/admin/vendor/flot/jquery.flot.pie.js"></script>
    <script src="{{ asset('assets') }}/admin/vendor/flot/jquery.flot.time.js"></script>
    <script src="{{ asset('assets') }}/admin/vendor/flot/jquery.flot.categories.js"></script>
    <script src="{{ asset('assets') }}/admin/vendor/jquery.flot.spline/jquery.flot.spline.js"></script>
    <!-- EASY PIE CHART-->
    <script src="{{ asset('assets') }}/admin/vendor/easy-pie-chart/dist/jquery.easypiechart.js"></script>

    <!-- Datatables-->
    <script src="{{ asset('assets') }}/admin/vendor/datatables.net/js/jquery.dataTables.js"></script>
    <script src="{{ asset('assets') }}/admin/vendor/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
    <script src="{{ asset('assets') }}/admin/vendor/datatables.net-buttons/js/dataTables.buttons.js"></script>
    <script src="{{ asset('assets') }}/admin/vendor/datatables.net-buttons-bs/js/buttons.bootstrap.js"></script>
    <script src="{{ asset('assets') }}/admin/vendor/datatables.net-buttons/js/buttons.colVis.js"></script>
    <script src="{{ asset('assets') }}/admin/vendor/datatables.net-buttons/js/buttons.flash.js"></script>
    <script src="{{ asset('assets') }}/admin/vendor/datatables.net-buttons/js/buttons.html5.js"></script>
    <script src="{{ asset('assets') }}/admin/vendor/datatables.net-buttons/js/buttons.print.js"></script>
    <script src="{{ asset('assets') }}/admin/vendor/datatables.net-keytable/js/dataTables.keyTable.js"></script>
    <script src="{{ asset('assets') }}/admin/vendor/datatables.net-responsive/js/dataTables.responsive.js"></script>
    <script src="{{ asset('assets') }}/admin/vendor/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="{{ asset('assets') }}/admin/vendor/jszip/dist/jszip.js"></script>
    <script src="{{ asset('assets') }}/admin/vendor/pdfmake/build/pdfmake.js"></script>
    <script src="{{ asset('assets') }}/admin/vendor/pdfmake/build/vfs_fonts.js"></script>

    <!-- =============== APP SCRIPTS ===============-->
    <!-- MOMENT JS-->
    <script src="{{ asset('assets') }}/admin/vendor/moment/min/moment-with-locales.js"></script>
    <!-- =============== APP SCRIPTS ===============-->
    <script src="{{ asset('assets') }}/admin/js/app.js"></script>
    <script src="{{ asset('assets') }}/admin/js/js.js"></script>
    <script src="{{ asset('assets') }}/admin/js/select2.js"></script>
    <script src="{{ asset('assets') }}/admin/js/logoview.js"></script>
    <script src="{{ asset('assets') }}/admin/js/site-en.json"></script>
    
    <script>
        $(document).ready(function() {
            $(".alert").slideDown(300).delay(5000).slideUp(300);
        });

    </script>

</body>


<!-- Mirrored from themicon.co/theme/angle/v4.0/static-html/app/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 20 Nov 2018 12:41:00 GMT -->
</html>
