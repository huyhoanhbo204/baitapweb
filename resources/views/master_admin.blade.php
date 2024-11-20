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

    <!-- bootstrap-css -->
    <link rel="stylesheet" href="{{asset('/style/admin/css/bootstrap.min.css')}}">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="{{asset('/style/admin/css/style.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('/style/admin/css/style-responsive.css')}}" rel="stylesheet" />
    <!-- font CSS -->
    <link
        href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="{{asset('/style/admin//font.css')}}" type="text/css" />
    <link href="{{asset('/style/admin/css/font-awesome.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/style/admin/css/morris.css')}}" type="text/css" />
    <!-- calendar -->
    <link rel="stylesheet" href="{{asset('/style/admin/css/monthly.css')}}">
    <!-- //calendar -->
    <!-- //font-awesome icons -->

    <!-- CKEditor CDN -->
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

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

    <script src="{{asset('/style/admin/js/bootstrap.js')}}"></script>
    <script src="{{asset('/style/admin/js/jquery.dcjqaccordion.2.7.js')}}"></script>
    <script src="{{asset('/style/admin/js/scripts.js')}}"></script>
    <script src="{{asset('/style/admin/js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('/style/admin/js/jquery.nicescroll.js')}}"></script>
    <script src="{{asset('/style/admin/js/jquery.scrollTo.js')}}"></script>

    <!-- CKEditor Initialization -->
    <script>
        // Khởi tạo CKEditor cho các textarea
        ClassicEditor
            .create(document.querySelector('#product_desc'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#product_content'))
            .catch(error => {
                console.error(error);
            });
    </script>




    <!-- Calendar -->
    <script type="text/javascript" src="/style/admin/js/monthly.js"></script>
    <script type="text/javascript">
        $(window).load(function () {
            $('#mycalendar').monthly({
                mode: 'event',
            });

            $('#mycalendar2').monthly({
                mode: 'picker',
                target: '#mytarget',
                setWidth: '250px',
                startHidden: true,
                showTrigger: '#mytarget',
                stylePast: true,
                disablePast: true
            });

            switch (window.location.protocol) {
                case 'http:':
                case 'https:':
                    break;
                case 'file:':
                    alert('Just a heads-up, events will not work when run locally.');
            }
        });
    </script>
</body>

</html>