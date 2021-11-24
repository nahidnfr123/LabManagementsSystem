<!DOCTYPE html>
<html lang="en">
<head>
    <title>Health - Medical Website Template</title>
    <!--

    Template 2098 Health

    http://www.tooplate.com/view/2098-health

    -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Tooplate">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="{{  asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{  asset('frontend/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{  asset('frontend/css/animate.css') }}">
    <link rel="stylesheet" href="{{  asset('frontend/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{  asset('frontend/css/owl.theme.default.min.css') }}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{  asset('frontend/css/tooplate-style.css') }}">
    <link rel="stylesheet" href="{{  asset('asset_front/material-date-range-picker/dist/duDatepicker.min.css') }}">
    <link rel="stylesheet" href="{{  asset('asset_front/material-date-range-picker/dist/duDatepicker-theme.css') }}">
    <script src="{{  asset('asset_front/material-date-range-picker/dist/duDatepicker.min.js') }}"></script>

    <link rel="stylesheet" href="{{  asset('asset_front/user-friendly-time-picker/dist/css/timepicker.min.css') }}">

    <style>
        .form-control {
            border: 2px solid black
        }
    </style>
    {{ $links ?? "" }}
</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
@include('sweetalert::alert')

<!-- PRE LOADER -->
<section class="preloader">
    <div class="spinner">
        <span class="spinner-rotate"></span>
    </div>
</section>


<!-- HEADER -->
<header>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-5">
                <p>Welcome to a Professional Health Care</p>
            </div>
            <div class="col-md-8 col-sm-7 text-align-right">
                <span class="phone-icon"><i class="fa fa-phone"></i> 010-060-0160</span>
                <span class="date-icon"><i class="fa fa-calendar-plus-o"></i> 6:00 AM - 10:00 PM (Mon-Fri)</span>
                <span class="email-icon"><i class="fa fa-envelope-o"></i> <a href="#">info@company.com</a></span>
            </div>
        </div>
    </div>
</header>


<!-- MENU -->
<section class="navbar navbar-default navbar-static-top" role="navigation" style="z-index: 10 !important;">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
            </button>

            <!-- lOGO TEXT HERE -->
            <a href="index.html" class="navbar-brand"><i class="fa fa-h-square"></i>ealth Center</a>
        </div>

        <!-- MENU LINKS -->
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/" class="smoothScroll">Home</a></li>
                @if (Route::has('login'))
                    @auth
                        @role('patient')
                        <li><a href="{{ url('/profile') }}">Profile </a></li>
                    @else
                        <li><a href="{{ url('/backend') }}">Dashboard</a></li>
                        @endrole
                        @else
                            <li><a href="{{ route('login') }}">Log in</a></li>
                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @endif
                        @endauth
                    @endif
                    @auth
                        <li>
                            <form method="POST" action="{{ route('logout') }}" style="margin: 12px; padding: 0">
                                @csrf
                                <a href="{{route('logout')}}"
                                   onclick="event.preventDefault();this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        </li>
                    @endauth
            </ul>
        </div>

    </div>
</section>

{{ $slot }}

<!-- FOOTER -->
<footer data-stellar-background-ratio="5" style="background-color: #1a252f; color: white;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="footer-thumb">
                    <h4 class="wow fadeInUp" data-wow-delay="0.4s">Contact Info</h4>
                    <p>Fusce at libero iaculis, venenatis augue quis, pharetra lorem. Curabitur ut dolor eu elit consequat ultricies.</p>

                    <div class="contact-info">
                        <p><i class="fa fa-phone"></i> 010-070-0170</p>
                        <p><i class="fa fa-envelope-o"></i> <a href="#">info@company.com</a></p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-4">
                <div class="footer-thumb">
                    <h4 class="wow fadeInUp" data-wow-delay="0.4s">Latest News</h4>
                    <div class="latest-stories">
                        <div class="stories-image">
                            <a href="#"><img src="images/news-image.jpg" class="img-responsive" alt=""></a>
                        </div>
                        <div class="stories-info">
                            <a href="#"><h5>Amazing Technology</h5></a>
                            <span>March 08, 2018</span>
                        </div>
                    </div>

                    <div class="latest-stories">
                        <div class="stories-image">
                            <a href="#"><img src="images/news-image.jpg" class="img-responsive" alt=""></a>
                        </div>
                        <div class="stories-info">
                            <a href="#"><h5>New Healing Process</h5></a>
                            <span>February 20, 2018</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-4">
                <div class="footer-thumb">
                    <div class="opening-hours">
                        <h4 class="wow fadeInUp" data-wow-delay="0.4s">Opening Hours</h4>
                        <p>Monday - Friday <span>06:00 AM - 10:00 PM</span></p>
                        <p>Saturday <span>09:00 AM - 08:00 PM</span></p>
                        <p>Sunday <span>Closed</span></p>
                    </div>

                    <ul class="social-icon">
                        <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                        <li><a href="#" class="fa fa-twitter"></a></li>
                        <li><a href="#" class="fa fa-instagram"></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 border-top">
                <div class="col-md-4 col-sm-6">
                    <div class="copyright-text">
                        <p>Copyright &copy; 2018 Your Company

                            | Design: Tooplate</p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="footer-link">
                        <a href="#">Laboratory Tests</a>
                        <a href="#">Departments</a>
                        <a href="#">Insurance Policy</a>
                        <a href="#">Careers</a>
                    </div>
                </div>
                <div class="col-md-2 col-sm-2 text-align-center">
                    <div class="angle-up-btn">
                        <a href="#top" class="smoothScroll wow fadeInUp" data-wow-delay="1.2s"><i class="fa fa-angle-up"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</footer>

<!-- SCRIPTS -->
<script src="{{  asset('frontend/js/jquery.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<script src="{{  asset('frontend/js/bootstrap.min.js') }}"></script>
<script src="{{  asset('frontend/js/jquery.sticky.js') }}"></script>
<script src="{{  asset('frontend/js/jquery.stellar.min.js') }}"></script>
<script src="{{  asset('frontend/js/wow.min.js') }}"></script>
<script src="{{  asset('frontend/js/smoothscroll.js') }}"></script>
<script src="{{  asset('frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{  asset('frontend/js/custom.js') }}"></script>

{{ $scripts ?? "" }}
</body>
</html>
