<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    @foreach( $settings as $setting)
    <title>{{ $setting['value'] }}</title>
    @endforeach
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <!-- fevicon -->
    <link rel="icon" href="{{ asset('images/fevicon.png" type="image/gif') }}">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->


</head>
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <!-- <div class="loader"><img src="{{ asset('images/loading.gif') }}" alt="#" /></div> -->
    </div>
    <!-- end loader -->

    <div class="wrapper">


        <div class="sidebar">
            <!-- Sidebar  -->
            <nav id="sidebar">

                <div id="dismiss">
                    <i class="fa fa-arrow-left"></i>
                </div>

                <ul class="list-unstyled components">

                    <li class="active"> <a href="/">Home</a></li>
                    @foreach( $menus as $menu)
                    <li> <a href="{{ $menu['url'] }}">{{ $menu['title'] }}</a></li>
                    @endforeach

                </ul>

            </nav>
        </div>

        <div id="content">
            <!-- header -->
            <header>
                <!-- header inner -->
                <div class="header">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-4 logo_section">
                                <div class="full">
                                    <div class="center-desk">
                                        @foreach( $settings as $setting)
                                        @if($setting['key'] == "site.logo")
                                        <div class="logo">
                                            <a href="/"><img src="{{ asset('storage/' . $setting['value']) }}"
                                                    alt="#"></a>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <ul class="text-right h5">
                                    @guest
                                    @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                    @endif

                                    @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                    @endif

                                    @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle mr-4" href="#"
                                            role="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                    @endguest
                                </ul>
                            </div>
                            <div class="col-lg-3">
                                <div class="right_header_info">
                                    <ul>
                                        <li>
                                            <a href="/login"><img style="margin-right: 15px;"
                                                    src="{{ asset('icon/1.png') }}" alt="#" /></a>
                                        </li>

                                        <li class="tytyu">
                                            <a href="#"><img style="margin-right: 15px;" src="{{ asset('icon/2.png') }}"
                                                    alt="#" /></a>
                                        </li>

                                        <li><a href="/shopping-cart" id="cart"><i class="fa fa-shopping-cart text-dark"></i><span
                                                    class="badge text-dark">({{ Cart::count() }})</span></a></li>

                                        <li>
                                            <button type="button" id="sidebarCollapse">
                                                <img src="{{ asset('images/menu_icon.png') }}" alt="#" />
                                            </button>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- end header inner -->
            </header>
            <!-- end header -->


            @yield('section')

            <!--  footer -->
            <footer>
                <div class="footer">
                    <div class="container-fluid">
                        <div class="border1">
                            <div class="row">
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                    <img class="logo1" src="{{ asset('images/logo1.jpg') }}" />
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <ul class="lik">
                                        <li> <a href="/">Home</a></li>
                                        @foreach($menus as $menu)
                                        <li> <a href="{{ $menu['url'] }}">{{ $menu['title'] }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                    <ul class="sociel">
                                        <li> <a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                        <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li> <a href="#"><i class="fa fa-instagram"></i></a></li>
                                        <li> <a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="new">
                                    <h3>Newsletter</h3>
                                    <form class="newtetter">
                                        <input class="tetter" placeholder="Your email" type="text" name="Your email">
                                        <button class="submit">Subscribe</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="newtt">
                                    <p>It is a long established fact that a reader will be distracted by the readable
                                        content of a page when looking at its layout. The point<br> of using Lorem I</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="copyright">
                        <p>Copyright 2019 All Right Reserved By <a href="https://html.design/">Free html Templates</a>
                        </p>
                    </div>
                </div>


                <!-- Javascript files-->
                <script src="{{ asset('js/jquery.min.js') }}"></script>
                <script src="{{ asset('js/popper.min.js') }}"></script>
                <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
                <script src="{{ asset('js/jquery-3.0.0.min.js') }}"></script>
                <!-- sidebar -->
                <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
                <script src="{{ asset('js/custom.js') }}"></script>
                <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
                <script type="text/javascript">
                $(document).ready(function() {

                    $("#sidebar").mCustomScrollbar({
                        theme: "minimal"
                    });

                    $('#dismiss, .overlay').on('click', function() {
                        $('#sidebar').removeClass('active');
                        $('.overlay').removeClass('active');
                    });

                    $('#sidebarCollapse').on('click', function() {
                        $('#sidebar').addClass('active');
                        $('.overlay').addClass('active');
                        $('.collapse.in').toggleClass('in');
                        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
                    });

                });
                </script>
                <script>
                // This example adds a marker to indicate the position of Bondi Beach in Sydney,
                // Australia.
                function initMap() {
                    var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 11,
                        center: {
                            lat: 40.645037,
                            lng: -73.880224
                        },
                    });

                    var image = 'images/maps-and-flags.png';
                    var beachMarker = new google.maps.Marker({
                        position: {
                            lat: 40.645037,
                            lng: -73.880224
                        },
                        map: map,
                        icon: image
                    });
                }
                (function() {

                    $("#cart").on("click", function() {
                        $(".shopping-cart").fadeToggle("fast");
                    });

                })();
                </script>
                <!-- google map js -->
                <script
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap">
                </script>
                <!-- end google map js -->

</body>

</html>
