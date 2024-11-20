<!DOCTYPE html>
<html lang="en">

<head>
    <title>Visitors an Admin Panel Category Bootstrap Responsive Website Template | Home :: w3layouts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Visitors Responsive web template, 
    Bootstrap Web Templates, Flat Web Templates, Android Compatible web 
    template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, 
    LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

    @include('layouts.admin.css')


    <script src="{{asset('/style/admin/js/jquery2.0.3.min.js')}}"></script>
    <script src="{{asset('/style/admin/js/raphael-min.js')}}"></script>
    <script src="{{asset('/style/admin/js/morris.js')}}"></script>
</head>

<body>
    <section id="container">
        <!--header start-->
        <header class="header fixed-top clearfix">
            <!--logo start-->
            <div class="brand">
                <a href="index.html" class="logo">
                    ADMIN
                </a>
                <div class="sidebar-toggle-box">
                    <div class="fa fa-bars"></div>
                </div>
            </div>
            <!--logo end-->
            <div class="top-nav clearfix">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <li>
                        <input type="text" class="form-control search" placeholder="Search">
                    </li>
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="{{('public/backend/images/2.png')}}">
                            <span class="username">
                                @if(Session::has('admin_name'))
                                    {{ Session::get('admin_name') }}
                                @endif
                            </span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <li><a href="#"><i class="fa fa-suitcase"></i> Cá nhân</a></li>
                            <li><a href="#"><i class="fa fa-cog"></i> Cài đặt</a></li>
                            <li><a href="{{route('admin.logout')}}"><i class="fa fa-key"></i> Đăng xuất</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>
        <!--header end-->
        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse">
                @include('layouts.admin.nav')
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                @yield('admin_content')

                <!-- Form Example -->

            </section>
            <!-- footer -->
            <div class="footer">
                <div class="wthree-copyright">
                    <p>Ban quyền của ai <a href="http://w3layouts.com">W3layouts</a></p>
                </div>
            </div>
            <!-- / footer -->
        </section>
        <!--main content end-->
    </section>


    @include('layouts.admin.js')



</body>

</html>