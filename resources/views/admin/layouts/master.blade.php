<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{hd_config ('base.description')}}">
    <meta name="author" content="{{hd_config ('base.keyword')}}">
    <meta name="csrf-token" content="{{csrf_token ()}}">
    <!-- Favicon icon -->

    <link rel="icon" type="image/png" sizes="16x16" href="{{asset ('org/assets')}}/images/favicon.png">
    <title>{{hd_config ('base.title')}}</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset ('org/assets')}}/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- chartist CSS -->
    <link href="{{asset ('org/assets')}}/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="{{asset ('org/assets')}}/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="{{asset ('org/assets')}}/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css"
          rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="{{asset ('org/assets')}}/plugins/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset ('org/assets')}}/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{asset ('org/assets')}}/css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    @stack('css')
</head>

<body class="fix-header fix-sidebar card-no-border">

@include('admin.layouts.header')
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
    </svg>
</div>


<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">

    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!--管理员信息-->
            <div class="user-profile"
                 style="background: url({{asset ('org/assets')}}/images/background/user-info.jpg) no-repeat;">
                <!-- User profile image -->
                <div class="profile-img"><img src="{{asset ('org/assets')}}/images/users/profile.png" alt="user"/></div>
                <!-- User profile text-->
                @auth('admin')
                <div class="profile-text"><a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown"
                                             role="button" aria-haspopup="true"
                                             aria-expanded="true">{{auth ('admin')->user ()->username}}</a>
                    <div class="dropdown-menu animated flipInY">

                        <a href="{{route ('admin.login.logout')}}" class="dropdown-item"><i class="fa fa-power-off"></i>
                            退出</a></div>
                </div>
                    @endauth
            </div>
            {{--侧边栏--}}
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li class="nav-small-cap">商城管理系统</li>
                    <li><a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                                class="mdi mdi-gauge"></i><span class="hide-menu">商品管理 </span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{route ('admin.product.index')}}"> 商品分类</a></li>
                            <li><a href="{{route ('admin.good.index')}}">商品详情</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                                class="mdi mdi-laptop-windows"></i><span class="hide-menu">网站配置 </span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{route ('admin.config.edit',['name'=>'base'])}}">基础配置</a></li>
                            <li><a href="{{route ('admin.config.edit',['name'=>'upload'])}}">上传配置</a></li>
                        </ul>
                    </li>

                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
    @yield('content')
    <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer"> © 2017 Yjshop Pro Admin by bobozhou.com</footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{asset ('org/assets')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset ('org/assets')}}/plugins/bootstrap/js/popper.min.js"></script>
<script src="{{asset ('org/assets')}}/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{asset ('org/assets')}}/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="{{asset ('org/assets')}}/js/waves.js"></script>
<!--Menu sidebar -->
<script src="{{asset ('org/assets')}}/js/sidebarmenu.js"></script>
<!--stickey kit -->
<script src="{{asset ('org/assets')}}/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
<script src="{{asset ('org/assets')}}/plugins/sparkline/jquery.sparkline.min.js"></script>

<!--Custom JavaScript -->
<script src="{{asset ('org/assets')}}/js/custom.min.js"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<!-- chartist chart -->
<script src="{{asset ('org/assets')}}/plugins/chartist-js/dist/chartist.min.js"></script>
<script
    src="{{asset ('org/assets')}}/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
<!--c3 JavaScript -->
<script src="{{asset ('org/assets')}}/plugins/d3/d3.min.js"></script>
<script src="{{asset ('org/assets')}}/plugins/c3-master/c3.min.js"></script>
<!-- Chart JS -->
<script src="{{asset ('org/assets')}}/js/dashboard1.js"></script>
<!-- ============================================================== -->
<!-- Style switcher -->
<!-- ============================================================== -->
<script src="{{asset ('org/assets')}}/plugins/styleswitcher/jQuery.style.switcher.js"></script>
@stack('js')
@include('layouts.message')
</body>

</html>
