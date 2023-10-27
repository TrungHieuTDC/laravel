<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ==== Document Title ==== -->
    <title>USNews - Multipurpose News, Magazine and Blog HTML5 Template</title>
    
    <!-- ==== Document Meta ==== -->
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- ==== Favicons ==== -->
    <link rel="icon" href="favicon.png" type="image/png">

    <!-- ==== Google Font ==== -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700">

    <!-- ==== Font Awesome ==== -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    
    <!-- ==== Bootstrap Framework ==== -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    
    <!-- ==== Bar Rating Plugin ==== -->
    <link rel="stylesheet" href="{{asset('css/fontawesome-stars-o.min.css')}}">
    
    <!-- ==== Main Stylesheet ==== -->
    <link rel="stylesheet" href="{{asset('style.css')}}">
    
    <!-- ==== Responsive Stylesheet ==== -->
    <link rel="stylesheet" href="{{asset('css/responsive-style.css')}}">

    <!-- ==== Theme Color Stylesheet ==== -->
    <link rel="stylesheet" href="{{asset('css/colors/theme-color-1.css')}}" id="changeColorScheme">
    
    <!-- ==== Custom Stylesheet ==== -->
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">

    <!-- ==== HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries ==== -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <?php
        use App\Http\Controllers\CategoryController; 
        use App\Http\Controllers\ArticleController;
        $keyContinue = 0;
        $dataCategory = new CategoryController();
        $dataArticle = new ArticleController();
    ?>
    
    <!-- Preloader Start -->
    <div id="preloader">
        <div class="preloader bg--color-1--b" data-preloader="1">
            <div class="preloader--inner"></div>
        </div>
    </div>
    <!-- Preloader End -->

    <!-- Wrapper Start -->
    <div class="wrapper">
        <!-- Header Section Start -->
        <header class="header--section header--style-1">
            <!-- Header Topbar Start -->
            <div class="header--topbar bg--color-2">
                <div class="container">
                    <div class="float--left float--xs-none text-xs-center">
                        <!-- Header Topbar Info Start -->
                        <ul class="header--topbar-info nav">
                            <li><i class="fa fm fa-map-marker"></i>Viet Nam</li>
                            <li><i class="fa fm fa-mixcloud"></i>21<sup>0</sup> C</li>
                            <li><i class="fa fm fa-calendar"></i>Today (Sat 27 May 2023)</li>
                        </ul>
                        <!-- Header Topbar Info End -->
                    </div>

                    <div class="float--right float--xs-none text-xs-center">
                        <!-- Header Topbar Action Start -->
                        @if (empty($_SESSION['id_user']))
                        <ul class="header--topbar-action nav">
                            <li><a href="/login"><i class="fa fm fa-user-o"></i>Login/Register</a></li>
                        </ul>
                        @endif

                        @if (!empty($_SESSION['id_user']))
                        <ul class="header--topbar-action nav">
                            <li><a href="{{route('viewuser.id',['id'=>$_SESSION['id_user']])}}"><i class="fa fm fa-user-o"></i><?php echo $customAuth->getUserID($_SESSION['id_user'])[0]->name  ?></a></li>
                            <li class="logout"><a href="/login">Log Out</a></li>
                        </ul>
                        @endif
                        <!-- Header Topbar Action End -->
                       
                    </div>
                </div>
            </div>
            <!-- Header Topbar End -->

            <!-- Header Mainbar Start -->
            <div class="header--mainbar">
                <div class="container">
                    <!-- Header Logo Start -->
                    <div class="header--logo float--left float--sm-none text-sm-center">
                        <h1 class="h1">
                            <a href="home-1.html" class="btn-link">
                                <img src="/img/logo.png" alt="USNews Logo">
                                <span class="hidden">USNews Logo</span>
                            </a>
                        </h1>
                    </div>
                    <!-- Header Logo End -->

                    <!-- Header Ad Start -->
                    <div class="header--ad float--right float--sm-none hidden-xs">
                        <a href="#">
                            <img src="/images/banner.png" alt="Advertisement" width="230" height="90">
                        </a>
                    </div>
                    <!-- Header Ad End -->
                </div>
            </div>
            <!-- Header Mainbar End -->

            <!-- Header Navbar Start -->
            <div class="header--navbar navbar bd--color-1 bg--color-1" data-trigger="sticky">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#headerNav" aria-expanded="false" aria-controls="headerNav">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <div id="headerNav" class="navbar-collapse collapse float--left">
                        <!-- Header Menu Links Start -->
                        <ul class="header--menu-links nav navbar-nav" data-trigger="hoverIntent">
                            <li><a href="/auth/home-1">Home</a></li>
                             
                            {{-- hien thi danh sach danh muc --}}
                           @foreach ($dataCategory->getAllCategory() as $valueCatagory)
                           <li><a href="/auth/listArticle_Category/{{$valueCatagory->id_categories}}">{{$valueCatagory->name}}</a></li>
                         @endforeach
                        </ul>
                        <!-- Header Menu Links End -->
                    </div>

                    <!-- Header Search Form Start -->
                    <form action="/auth/search_article" class="header--search-form float--right" method="GET" data-form="validate">
                        <input type="search" name="search" placeholder="Search..." class="header--search-control form-control" required>

                        <button type="submit" class="header--search-btn btn"><i class="header--search-icon fa fa-search"></i></button>
                    </form>
                    <!-- Header Search Form End -->
                </div>
            </div>
            <!-- Header Navbar End -->
        </header>
        <!-- Header Section End -->

        <!-- Posts Filter Bar Start -->
        <div class="posts--filter-bar style--1 hidden-xs">
            <div class="container">
                <ul class="nav">
                    <li>
                        <a href="/auth/featurednew">
                            <i class="fa fa-star-o"></i>
                            <span>Featured News</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-heart-o"></i>
                            <span>Most Popular</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-fire"></i>
                            <span>Hot News</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-flash"></i>
                            <span>Trending News</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-eye"></i>
                            <span>Most Watched</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        @yield('content')
        <!-- Main Content Section End -->

        <!-- Footer Section Start -->
        <footer class="footer--section">
            <!-- Footer Widgets Start -->
            <div class="footer--widgets pd--30-0 bg--color-2">
                <div class="container">
                    <div class="row AdjustRow">
                        <div class="col-md-3 col-xs-6 col-xxs-12 ptop--30 pbottom--30">
                            <!-- Widget Start -->
                            <div class="widget">
                                <div class="widget--title">
                                    <h2 class="h4">About Us</h2>

                                    <i class="icon fa fa-exclamation"></i>
                                </div>

                                <!-- About Widget Start -->
                                <div class="about--widget">
                                    <div class="content">
                                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium laborum et dolorum fuga.</p>
                                    </div>

                                    <div class="action">
                                        <a href="#" class="btn-link">Read More<i class="fa flm fa-angle-double-right"></i></a>
                                    </div>

                                    <ul class="nav">
                                        <li>
                                            <i class="fa fa-map"></i>
                                            <span>143/C, Fake Street, Melborne, Australia</span>
                                        </li>
                                        <li>
                                            <i class="fa fa-envelope-o"></i>
                                            <a href="mailto:example@example.com">example@example.com</a>
                                        </li>
                                        <li>
                                            <i class="fa fa-phone"></i>
                                            <a href="tel:+123456789">+123 456 (789)</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- About Widget End -->
                            </div>
                            <!-- Widget End -->
                        </div>

                        <div class="col-md-3 col-xs-6 col-xxs-12 ptop--30 pbottom--30">
                            <!-- Widget Start -->
                            <div class="widget">
                                <div class="widget--title">
                                    <h2 class="h4">Usefull Info Links</h2>

                                    <i class="icon fa fa-expand"></i>
                                </div>

                                <!-- Links Widget Start -->
                                <div class="links--widget">
                                    <ul class="nav">
                                        <li><a href="#" class="fa-angle-right">Gadgets</a></li>
                                        <li><a href="#" class="fa-angle-right">Shop</a></li>
                                        <li><a href="#" class="fa-angle-right">Term and Conditions</a></li>
                                        <li><a href="#" class="fa-angle-right">Forums</a></li>
                                        <li><a href="#" class="fa-angle-right">Top News of This Week</a></li>
                                        <li><a href="#" class="fa-angle-right">Special Recipes</a></li>
                                        <li><a href="#" class="fa-angle-right">Sign Up</a></li>
                                    </ul>
                                </div>
                                <!-- Links Widget End -->
                            </div>
                            <!-- Widget End -->
                        </div>

                        <div class="col-md-3 col-xs-6 col-xxs-12 ptop--30 pbottom--30">
                            <!-- Widget Start -->
                            <div class="widget">
                                <div class="widget--title">
                                    <h2 class="h4">Advertisements</h2>

                                    <i class="icon fa fa-bullhorn"></i>
                                </div>

                                <!-- Links Widget Start -->
                                <div class="links--widget">
                                    <ul class="nav">
                                        <li><a href="#" class="fa-angle-right">Post an Add</a></li>
                                        <li><a href="#" class="fa-angle-right">Adds Renew</a></li>
                                        <li><a href="#" class="fa-angle-right">Price of Advertisements</a></li>
                                        <li><a href="#" class="fa-angle-right">Adds Closed</a></li>
                                        <li><a href="#" class="fa-angle-right">Monthly or Yearly</a></li>
                                        <li><a href="#" class="fa-angle-right">Trial Adds</a></li>
                                        <li><a href="#" class="fa-angle-right">Add Making</a></li>
                                    </ul>
                                </div>
                                <!-- Links Widget End -->
                            </div>
                            <!-- Widget End -->
                        </div>

                        <div class="col-md-3 col-xs-6 col-xxs-12 ptop--30 pbottom--30">
                            <!-- Widget Start -->
                            <div class="widget">
                                <div class="widget--title">
                                    <h2 class="h4">Career</h2>

                                    <i class="icon fa fa-user-o"></i>
                                </div>

                                <!-- Links Widget Start -->
                                <div class="links--widget">
                                    <ul class="nav">
                                        <li><a href="#" class="fa-angle-right">Available Post</a></li>
                                        <li><a href="#" class="fa-angle-right">Career Details</a></li>
                                        <li><a href="#" class="fa-angle-right">How to Apply?</a></li>
                                        <li><a href="#" class="fa-angle-right">Freelence Job</a></li>
                                        <li><a href="#" class="fa-angle-right">Be a Member</a></li>
                                        <li><a href="#" class="fa-angle-right">Apply Now</a></li>
                                        <li><a href="#" class="fa-angle-right">Send Your Resume</a></li>
                                    </ul>
                                </div>
                                <!-- Links Widget End -->
                            </div>
                            <!-- Widget End -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Widgets End -->

            <!-- Footer Copyright Start -->
            <div class="footer--copyright bg--color-3">
                <div class="social--bg bg--color-1"></div>

                <div class="container">
                    <p class="text float--left">&copy; 2017 <a href="#">USNEWS</a>. All Rights Reserved.</p>

                    <ul class="nav social float--right">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                    </ul>

                    <ul class="nav links float--right">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Support</a></li>
                    </ul>
                </div>
            </div>
            <!-- Footer Copyright End -->
        </footer>
        <!-- Footer Section End -->
    </div>
    <!-- Wrapper End -->

    <!-- Sticky Social Start -->
    <div id="stickySocial" class="sticky--right">
        <ul class="nav">
            <li>
                <a href="#">
                    <i class="fa fa-facebook"></i>
                    <span>Follow Us On Facebook</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-twitter"></i>
                    <span>Follow Us On Twitter</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-google-plus"></i>
                    <span>Follow Us On Google Plus</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-rss"></i>
                    <span>Follow Us On RSS</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-vimeo"></i>
                    <span>Follow Us On Vimeo</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-youtube-play"></i>
                    <span>Follow Us On Youtube Play</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-linkedin"></i>
                    <span>Follow Us On LinkedIn</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- Sticky Social End -->

    <!-- Back To Top Button Start -->
    <div id="backToTop">
        <a href="#"><i class="fa fa-angle-double-up"></i></a>
    </div>
    <!-- Back To Top Button End -->

    <!-- ==== jQuery Library ==== -->
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>

    <!-- ==== Bootstrap Framework ==== -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <!-- ==== StickyJS Plugin ==== -->
    <script src="{{asset('js/jquery.sticky.min.js')}}"></script>

    <!-- ==== HoverIntent Plugin ==== -->
    <script src="{{asset('js/jquery.hoverIntent.min.js')}}"></script>

    <!-- ==== Marquee Plugin ==== -->
    <script src="{{asset('js/jquery.marquee.min.js')}}"></script>

    <!-- ==== Validation Plugin ==== -->
    <script src="{{asset('js/jquery.validate.min.js')}}"></script>

    <!-- ==== Isotope Plugin ==== -->
    <script src="{{asset('js/isotope.min.js')}}"></script>

    <!-- ==== Resize Sensor Plugin ==== -->
    <script src="{{asset('js/resizesensor.min.js')}}"></script>

    <!-- ==== Sticky Sidebar Plugin ==== -->
    <script src="js/theia-sticky-sidebar.min.js"></script>

    <!-- ==== Zoom Plugin ==== -->
    <script src="js/jquery.zoom.min.js"></script>

    <!-- ==== Bar Rating Plugin ==== -->
    <script src="{{asset('js/jquery.barrating.min.js')}}"></script>

    <!-- ==== Countdown Plugin ==== -->

    <!-- ==== RetinaJS Plugin ==== -->
    <script src="{{asset('js/retina.min.js')}}"></script>

    <!-- ==== Google Map API ==== -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBK9f7sXWmqQ1E-ufRXV3VpXOn_ifKsDuc"></script>

    <!-- ==== Main JavaScript ==== -->
    <script src="{{asset('js/main.js')}}"></script>

</body>
</html>
