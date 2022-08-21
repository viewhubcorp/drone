
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Canaveral OS</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
{{--            <li class="nav-item d-none d-sm-inline-block">--}}
{{--                <a href="index3.html" class="nav-link">Home</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item d-none d-sm-inline-block">--}}
{{--                <a href="#" class="nav-link">Contact</a>--}}
{{--            </li>--}}
        </ul>

        <!-- SEARCH FORM -->
{{--        <form class="form-inline ml-3">--}}
{{--            <div class="input-group input-group-sm">--}}
{{--                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">--}}
{{--                <div class="input-group-append">--}}
{{--                    <button class="btn btn-navbar" type="submit">--}}
{{--                        <i class="fas fa-search"></i>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </form>--}}

        <!-- Right navbar links -->








        <ul class="navbar-nav ml-auto">


            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="fas fa-envelope"></i>
                    <span class="badge badge-danger navbar-badge">28</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                    <span class="dropdown-item dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="fas fa-signal"></i>
                    <span class="badge badge-danger navbar-badge">off</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                    <span class="dropdown-item dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="fas fa-wifi"></i>
                    <span class="badge badge-success navbar-badge">on</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Brad Diesel
                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">Call me whenever you can...</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    John Pierce
                                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">I got your message bro</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Nora Silvester
                                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">The subject goes here</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="fas fa-battery-full text-green"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                    <span class="dropdown-item dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="fas fa-bolt text-green"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                    <span class="dropdown-item dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
        </ul>









    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/" class="brand-link">
            <img src="/dist/img/logo.png" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
            <strong class="brand-text ">CanaveralOS</strong>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column nav-compact nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                    <li class="nav-item">
                        <a href="{{route('azs_operator', [], false)}}" class="nav-link @if(isset($main_menu) && in_array('telemetry', $main_menu)) active @endif">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Телеметрия
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('azs_operator', [], false)}}" class="nav-link @if(isset($main_menu) && in_array('stat', $main_menu)) active @endif">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Статистика
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('azs_operator', [], false)}}" class="nav-link @if(isset($main_menu) && in_array('storage', $main_menu)) active @endif">
                            <i class="nav-icon far fa-folder-open"></i>
                            <p>
                                Хранилище
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('azs_operator', [], false)}}" class="nav-link @if(isset($main_menu) && in_array('log', $main_menu)) active @endif">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>
                                Логи
                            </p>
                        </a>
                    </li>

                    <li class="nav-item menu-is-opening menu-open">
                        <a href="#" class="nav-link @if(isset($main_menu) && in_array('setting', $main_menu)) active @endif">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>
                                Настройки
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="@if(isset($main_menu) && in_array('setting', $main_menu)) display: block; @else display: none; @endif">
                            <li class="nav-item">
                                <a href="./index.html" class="nav-link @if(isset($main_menu) && in_array('account', $main_menu)) active @endif">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>Аккаунты</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="./index.html" class="nav-link @if(isset($main_menu) && in_array('link', $main_menu)) active @endif">
                                    <i class="nav-icon fas fa-signal"></i>
                                    <p>Связь</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('setting.wifi_page', [], false)}}" class="nav-link @if(isset($main_menu) && in_array('wifi', $main_menu)) active @endif">
                                    <i class="nav-icon fas fa-wifi"></i>
                                    <p>Подключение к Wi-Fi</p>
                                </a>
                            </li>


                            <li class="nav-item">
                                <a href="./index.html" class="nav-link @if(isset($main_menu) && in_array('update', $main_menu)) active @endif">
                                    <i class="nav-icon fas fa-download"></i>
                                    <p>Обновление ПО</p>
                                </a>
                            </li>


                            <li class="nav-item">
                                <a href="./index.html" class="nav-link @if(isset($main_menu) && in_array('drone_setting', $main_menu)) active @endif">
                                    <i class="nav-icon fas fa-space-shuttle"></i>
                                    <p>Настройка дрона</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./index2.html" class="nav-link @if(isset($main_menu) && in_array('broadcast', $main_menu)) active @endif">
                                    <i class="nav-icon fas fa-camera"></i>
                                    <p>Трансляция видео</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./index3.html" class="nav-link @if(isset($main_menu) && in_array('storage_setting', $main_menu)) active @endif">
                                    <i class="nav-icon fas fa-database"></i>
                                    <p>Хранилище</p>
                                </a>
                            </li>
                        </ul>
                    </li>


{{--                    @if(auth()->user()->role == 2)--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{route('azs_list', [], false)}}" class="nav-link">--}}
{{--                                <i class="nav-icon fas fa-th"></i>--}}
{{--                                <p>--}}
{{--                                    Заправки--}}
{{--                                </p>--}}
{{--                            </a>--}}
{{--                        </li>--}}

{{--                        <li class="nav-item">--}}
{{--                            <a href="{{route('user_list', [], false)}}" class="nav-link">--}}
{{--                                <i class="nav-icon fas fa-th"></i>--}}
{{--                                <p>--}}
{{--                                    Персонал--}}
{{--                                </p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    @endif--}}

                    <li class="nav-item">
                        <a href="{{route('azs_operator', [], false)}}" class="nav-link @if(isset($main_menu) && in_array('terminal', $main_menu)) active @endif">
                            <i class="nav-icon fas fa-terminal"></i>
                            <p>
                                Консоль
                            </p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{route('azs_operator', [], false)}}" class="nav-link @if(isset($main_menu) && in_array('scripts', $main_menu)) active @endif">
                            <i class="nav-icon fas fa-code"></i>
                            <p>
                                Скрипты
                            </p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{route('azs_operator', [], false)}}" class="nav-link @if(isset($main_menu) && in_array('info', $main_menu)) active @endif">
                            <i class="nav-icon fas fa-info-circle"></i>
                            <p>
                                Информация
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('logout', [], false)}}" class="nav-link" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="nav-icon fas fa-power-off"></i>
                            <p>
                                Выход

                            </p>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
{{--        <div class="content-header">--}}
{{--            <div class="container-fluid">--}}
{{--                <div class="row mb-2">--}}
{{--                    <div class="col-sm-6">--}}
{{--                        <h1 class="m-0 text-dark">Starter Page</h1>--}}
{{--                    </div><!-- /.col -->--}}
{{--                    <div class="col-sm-6">--}}
{{--                        <div class="float-right" style="width: 100px;">--}}
{{--                            <a class="btn btn-block btn-success btn-md" style="color: #fff;"><i class="fas fa-plus"></i> Создать</a>--}}
{{--                        </div>--}}
{{--                    </div><!-- /.col -->--}}
{{--                </div><!-- /.row -->--}}
{{--            </div><!-- /.container-fluid -->--}}
{{--        </div>--}}
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif


            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif


            @if ($message = Session::get('warning'))
                <div class="alert alert-warning alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif


            @if ($message = Session::get('info'))
                <div class="alert alert-info alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif




                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            @yield('content')

        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->

    <footer class="main-footer">
        <strong>Canaveral OS © 2020-2022.</strong>
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 0.1-beta
        </div>
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>

<script>
    $(document).ready(function(){
        if(document.getElementById('type_transaction')){
            console.log($("#operator_count").val());
            console.log($("#operator_cost").val());

            $("#operator_liter").on('keyup', function(){
                $("#operator_sum").val($("#operator_liter").val() * $("#operator_cost").val())
            });

            $("#operator_sum").on('keyup', function(){
                $("#operator_liter").val($("#operator_sum").val() / $("#operator_cost").val())
            });

        }
    });
</script>
</body>
</html>
