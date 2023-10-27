<?php 
    //session_start();
?>
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
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    
    <!-- ==== Bootstrap Framework ==== -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    
    <!-- ==== Bar Rating Plugin ==== -->
    <link rel="stylesheet" href="/css/fontawesome-stars-o.min.css">
    
    <!-- ==== Main Stylesheet ==== -->
    <link rel="stylesheet" href="/style.css">
    
    <!-- ==== Responsive Stylesheet ==== -->
    <link rel="stylesheet" href="/css/responsive-style.css">

    <!-- ==== Theme Color Stylesheet ==== -->
    <link rel="stylesheet" href="/css/colors/theme-color-1.css" id="changeColorScheme">
    
    <!-- ==== Custom Stylesheet ==== -->
    <link rel="stylesheet" href="/css/custom.css">

    <!-- ==== HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries ==== -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <?php
        use App\Http\Controllers\ArticleController; 
        use App\Http\Controllers\CategoryController;
        use App\Http\Controllers\CustomAuthController; 

        $dataArticle = new ArticleController();
        $dataCategory = new CategoryController();
        $customAuth = new CustomAuthController();

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
                            <li><i class="fa fm fa-calendar"></i>Today (Sunday 19 April 2017)</li>
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
                    <form action="/auth/search_article" class="header--search-form float--right" data-form="validate">
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
        <!-- Posts Filter Bar End -->

        <!-- News Ticker Start -->
        <div class="news--ticker">
            <div class="container">
                <div class="news-updates--list" data-marquee="true">
                    <ul class="nav">

                        {{-- 5 bai viet som nhat --}}
                       @foreach ($dataArticle->getArticle_News(5) as $value)
                            <li>
                                {{-- tim kiem san pham theo id --}}
                                <h3 class="h3"><a href="/auth/detail/{{$value->id}}">{{$value->title}}</a></h3>
                            </li>
                       @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <!-- News Ticker End -->

        <!-- Main Breadcrumb Start -->
        <div class="main--breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="home-1.html" class="btn-link"><i class="fa fm fa-home"></i>Home</a></li>
                    <li class="active"><span>Search</span></li>
                </ul>
            </div>
        </div>
        <!-- Main Breadcrumb End -->

        <!-- Main Content Section Start -->
        <div class="main-content--section pbottom--30">
            <div class="container">
                <div class="row">
                    <!-- Main Content Start -->
                    <div class="main--content col-md-8 col-sm-7" data-sticky-content="true">
                        <div class="sticky-content-inner">
                            <!-- Search Widget Start -->
                            <div class="search--widget ptop--30">
                                <form action="#" data-form="validate">
                                    <div class="input-group">
                                        <input type="search" name="search" placeholder="Search..." class="form-control" required>

                                        <div class="input-group-btn">
                                            <button type="submit" class="btn-link"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- Search Widget End -->

                            <!-- Page Title Start -->
                            <div class="page--title ptop--30">
                                
                                <h2 class="h2">Search Results For: <span></span></h2>
                            </div>
                            <!-- Page Title End -->

                            {{--Danh sach bai viet theo danh muc  --}}
                            <div class="post--items post--items-5 pd--30-0">
                                <ul class="nav">
                                    @foreach ($data as $value)
                                        <li>
                                            <!-- Post Item Start -->
                                            <div class="post--item post--title-larger">
                                                <div class="row">
                                                    <div class="col-md-4 col-sm-12 col-xs-4 col-xxs-12">
                                                        <div class="post--img">
                                                            <a href="news-single-v1.html" class="thumb"><img src="/images/{{$value->img}}" alt=""></a>
                                                            <a href="#" class="cat">{{$value->name}}</a>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-8 col-sm-12 col-xs-8 col-xxs-12">
                                                        <div class="post--info">
                                                            <ul class="nav meta">
                                                                <li><a href="#">{{$value->name}}</a></li>
                                                                <li><a href="#">{{$value->created_at}}</a></li>
                                                            </ul>

                                                            <div class="title">
                                                                <h3 class="h4"><a href="/auth/detail/{{$value->id}}" class="btn-link">{{$value->title}}</a></h3>
                                                            </div>
                                                        </div>

                                                        {{-- <div class="post--content">
                                                            <p>{{$value->content}}</p>
                                                        </div> --}}

                                                        {{-- Chi tiet bai doc --}}
                                                        <div class="post--action">
                                                            <a href="/auth/detail/{{$value->id}}">Continue Reading...</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Post Item End -->
                                        </li>  
                                    @endforeach
                                </ul>
                            </div>
                            <!-- Post Items End -->

                            {{-- phan trang --}}
                            <div class="pagination--wrapper clearfix bdtop--1 bd--color-2 ptop--60 pbottom--30">
                                <p class="pagination-hint float--left">Page 02 of 03</p>

                                <ul class="pagination float--right">

                                    <li><a href="#">{{$data->links  ()}}</a></li>

                                    {{-- <li><a href="#"><i class="fa fa-long-arrow-left"></i></a></li>
                                    
                                    <li class="active"><span>02</span></li>
                                    <li><a href="#">03</a></li>
                                    <li>
                                        <i class="fa fa-angle-double-right"></i>
                                        <i class="fa fa-angle-double-right"></i>
                                        <i class="fa fa-angle-double-right"></i>
                                    </li>
                                    <li><a href="#">20</a></li>
                                    <li><a href="#"><i class="fa fa-long-arrow-right"></i></a></li> --}}
                                </ul>
                            </div>
                            <!-- Pagination End -->
                        </div>
                    </div>
                    <!-- Main Content End -->

                    <!-- Main Sidebar Start -->
                    <div class="main--sidebar col-md-4 col-sm-5 ptop--30 pbottom--30" data-sticky-content="true">
                        <div class="sticky-content-inner">
                            <div class="widget">
                                <div class="widget--title">
                                    <h2 class="h4">Tags</h2>
                                    <i class="icon fa fa-tags"></i>
                                </div>

                                <!-- Tags Widget Start -->
                                <div class="tags--widget style--1">
                                    <ul class="nav">
                                        <li><a href="#">News</a></li>
                                        <li><a href="#">Image</a></li>
                                        <li><a href="#">Music</a></li>
                                        <li><a href="#">Video</a></li>
                                        <li><a href="#">Audio</a></li>
                                        <li><a href="#">Fashion</a></li>
                                        <li><a href="#">Latest</a></li>
                                        <li><a href="#">Trendy</a></li>
                                        <li><a href="#">Special</a></li>
                                        <li><a href="#">Recipe</a></li>
                                        <li><a href="#">Sports</a></li>
                                    </ul>
                                </div>
                                <!-- Tags Widget End -->
                            </div>
                        </div>
                    </div>
                    <!-- Main Sidebar End -->
                </div>
            </div>
        </div>
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
    

    <!-- Back To Top Button Start -->
    <div id="backToTop">
        <a href="#"><i class="fa fa-angle-double-up"></i></a>
    </div>
    <!-- Back To Top Button End -->

    <!-- ==== jQuery Library ==== -->
    <script src="/js/jquery-3.2.1.min.js"></script>

    <!-- ==== Bootstrap Framework ==== -->
    <script src="/js/bootstrap.min.js"></script>

    <!-- ==== StickyJS Plugin ==== -->
    <script src="/js/jquery.sticky.min.js"></script>

    <!-- ==== HoverIntent Plugin ==== -->
    <script src="/js/jquery.hoverIntent.min.js"></script>

    <!-- ==== Marquee Plugin ==== -->
    <script src="/js/jquery.marquee.min.js"></script>

    <!-- ==== Validation Plugin ==== -->
    <script src="/js/jquery.validate.min.js"></script>

    <!-- ==== Isotope Plugin ==== -->
    <script src="/js/isotope.min.js"></script>

    <!-- ==== Resize Sensor Plugin ==== -->
    <script src="/js/resizesensor.min.js"></script>

    <!-- ==== Sticky Sidebar Plugin ==== -->
    <script src="/js/theia-sticky-sidebar.min.js"></script>

    <!-- ==== Zoom Plugin ==== -->
    <script src="/js/jquery.zoom.min.js"></script>

    <!-- ==== Bar Rating Plugin ==== -->
    <script src="/js/jquery.barrating.min.js"></script>

    <!-- ==== Countdown Plugin ==== -->
    <script src="/js/jquery.countdown.min.js"></script>

    <!-- ==== RetinaJS Plugin ==== -->
    <script src="/js/retina.min.js"></script>

    <!-- ==== Google Map API ==== -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBK9f7sXWmqQ1E-ufRXV3VpXOn_ifKsDuc"></script>

    <!-- ==== Main JavaScript ==== -->
    <script src="/js/main.js"></script>

</body>
</html>
