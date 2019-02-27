<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Quản lý Hệ thống thi trắc nghiệm</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('theme/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('theme/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('theme/bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('theme/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('theme/dist/css/skins/_all-skins.min.css')}}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{asset('theme/bower_components/morris.js/morris.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset('theme/bower_components/jvectormap/jquery-jvectormap.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{asset('theme/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('theme/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="{{asset('theme/https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic')}}">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">Quản lý Hệ thống thi</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            {{--<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">--}}
                {{--<span class="sr-only">Toggle navigation</span>--}}
            {{--</a>--}}
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <span ></span>
                <span>
                    <form action="{{route('nhanvien-logout')}}">
                        <table>
                            <tr>
                                <td style="color: white; font-size: 20px"><?php echo "Xin chào, ".$_SESSION['tenQuanLy']?></td>
                                <td>
                                    <input class="btn btn-default btn-sm" type="submit" method="post" value="Đăng xuất">
                                </td>
                            </tr>
                        </table>

                    </form>
                </span>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">Danh sách các danh mục</li>
                <li class="active">
                    <a href="{{route('sinhvien-list')}}">
                        <i class="fa fa-dashboard"></i> <span>Quản lý Sinh viên</span>
                    </a>
                </li>
                <li class="active">
                    <a href="{{route('monthi-list')}}">
                        <i class="fa fa-dashboard"></i> <span>Quản lý Môn thi</span>
                    </a
                    >
                </li>
                <li class="active">
                    <a href="{{route('dethi-list')}}">
                        <i class="fa fa-dashboard"></i> <span>Quản lý Đề thi</span>
                    </a>
                </li>
                <li class="active">
                    <a href="{{route('ketqua-list')}}">
                        <i class="fa fa-dashboard"></i> <span>Quản lý Điểm</span>
                    </a>
                </li>

                {{--<li class="active">--}}
                    {{--<a href="{{route('dichvu-list')}}">--}}
                        {{--<i class="fa fa-dashboard"></i> <span>Quản lý Dịch vụ</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="active">--}}
                    {{--<a href="{{route('datphong-list')}}">--}}
                        {{--<i class="fa fa-dashboard"></i> <span>Quản lý Đặt phòng</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="active">--}}
                    {{--<a href="{{route('datphong_phong-list')}}">--}}
                        {{--<i class="fa fa-dashboard"></i> <span>Danh sách Phòng đã đặt</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="active">--}}
                    {{--<a href="{{route('dichvu_phong-list')}}">--}}
                        {{--<i class="fa fa-dashboard"></i> <span>Quản lý Đặt dịch vụ</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="active">--}}
                    {{--<a href="{{route('hoadon-list')}}">--}}
                        {{--<i class="fa fa-dashboard"></i> <span>Quản lý Hóa đơn</span>--}}
                    {{--</a>--}}
                {{--</li>--}}


            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        {{--<section class="content-header">--}}
            {{--<ol class="breadcrumb">--}}
                {{--<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>--}}
                {{--<li class="active">Dashboard</li>--}}
            {{--</ol>--}}
        {{--</section>--}}

        <!-- Main content -->
        <section class="content">
            @yield('content')
        </section>
        <!-- /.content -->
    </div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>