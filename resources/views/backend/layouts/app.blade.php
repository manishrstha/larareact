<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image'/png" href="{{asset('admin/images/icon/favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/metisMenu.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/slicknav.min.css')}}">
    <!-- others css -->
    <link rel="stylesheet" href="{{asset('admin/css/typography.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/default-css.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/responsive.css')}}">
    <!-- modernizr css -->
    <script src="{{asset('admin/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    <style>
        td img{
            height:100px !important;
        }
    </style>
    @yield('styles')
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!-- preloader area start -->
       <!--  <div id="preloader">
           <div class="loader"></div>
       </div> -->
       <!-- preloader area end -->
       <!-- page container area start -->
       <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    @php 
                    $info = App\SiteInfo::limit(1)->first();
                    @endphp
                    <a href="{{route('dashboard.index')}}"><img src="{{asset('uploads/logo/'.$info->logo)}}" alt="{{$info->company_name}}"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li>
                                <a href="{{route('dashboard.index')}}"><i class="ti-dashboard"></i><span>dashboard</span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Pages</span></a>
                                @php 
                                $pages = App\Page::all();
                                @endphp
                                <ul class="collapse">
                                    <li><a href="{{route('page.index')}}">All Pages</a></li>
                                @foreach($pages as $page)
                                    <li><a href="{{route('page.show',$page->id)}}">{{$page->page_name}}</a></li>
                                @endforeach
                                </ul>
                            </li>
                            <li>
                                <a href="{{route('slider.index')}}"><i class="ti-image"></i><span>Home Slider</span></a>
                            </li>
                            <li>
                                <a href="{{route('review.index')}}"><i class="ti-comments"></i><span>Reviews</span></a>
                            </li>
                            <li>
                                <a href="{{route('affiliation.index')}}"><i class="ti-list"></i><span>Affiliations</span></a>
                            </li>
                            <li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-block">
                                    @csrf
                                    <button type="submit" class="btn btn-link w-100 text-left"> <i class="ti-settings"></i><span>Log out</span></button>
                                </form>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area pt-sm-0 pb-sm-0">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-6 clearfix">
                        <div class="user-profile float-sm-right">
                            <h4 class="user-name">
                                @if (session('status'))
                                {{ session('status') }}
                                @endif 
                                <small>{{ Auth::user()->name }}</small>
                            </h4>
                        </div>
                    </div>
                    <!-- profile info & task notification -->

                </div>
            </div>
            @yield('content')
            <footer>
                <div class="footer-area">
                    <p>© Copyright 2018. All right reserved.</p>
                </div>
            </footer>
            <!-- footer area end-->
        </div>
        <!-- page container area end -->
        <!-- offset area start -->
        <!-- offset area end -->
        <!-- jquery latest version -->
        <script src="{{asset('admin/js/vendor/jquery-2.2.4.min.js')}}"></script>
        <!-- bootstrap 4 js -->
        <script src="{{asset('admin/js/popper.min.js')}}"></script>
        <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('admin/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('admin/js/metisMenu.min.js')}}"></script>
        <script src="{{asset('admin/js/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('admin/js/jquery.slicknav.min.js')}}"></script>
        @yield('scripts')
        <!-- others plugins -->
        <script src="{{asset('admin/js/plugins.js')}}"></script>
        <script src="{{asset('admin/js/scripts.js')}}"></script>
    </body>

    </html>
