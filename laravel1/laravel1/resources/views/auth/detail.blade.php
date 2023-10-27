<?php
    // session_start();
    if (empty($_SESSION['id_user']))
    {
        $_SESSION['id_user'] = "";
    }
?>
@extends('layouts.layoutClient')
@section('content')
<?php 
    use App\Http\Controllers\Author;
    use App\Http\Controllers\ArticleController;
    use App\Http\Controllers\CustomAuthController; 
    use App\Http\Controllers\CommentCotroller; 

    $author = new Author();
    $articles = new ArticleController();
    $customAuth = new CustomAuthController();
    $comment = new CommentCotroller();
?>

<!-- Main Breadcrumb Start -->
<div class="main--breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="home-1.html" class="btn-link"><i class="fa fm fa-home"></i>Home</a></li>
            <li><a href="travel.html" class="btn-link">Chi tiết bài viết</a></li>
            <li class="active"><span></span></li>
        </ul>
    </div>
</div>
<!-- Main Breadcrumb End -->

<!-- Main Content Section Start -->
<div class="main-content--section pbottom--30">
    <div class="container">
        <div class="row">
            <!-- Main Content Start -->
            <div class="main--content col-md-8" data-sticky-content="true">
                <div class="sticky-content-inner">
                    <!-- Post Item Start -->
                    <div class="post--item post--single post--title-largest pd--30-0">
                        <div class="post--info">
                            <ul class="nav meta">
                                <li><a href="#">{{$author->searchAuthorIdArticles($article -> id)[0]->name}}</a></li>
                                <li><a href="#">20 April 2017</a></li>
                                <li><span><i class="fa fm fa-eye"></i>45k</span></li>
                                <li><a href="#"><i class="fa fm fa-comments-o"></i>02</a></li>
                            </ul>

                            <div class="title">
                                <h2 class="h4">{{$article->title}}</h2>
                            </div>
                        </div>

                        <div class="post--img">
                            <a href="#" class="thumb"><img src="/images/{{$article->img}}" alt=""></a>
                            <a href="#" class="icon"><i class="fa fa-star-o"></i></a>

                            <div class="post--map">
                                <p class="btn-link"><i class="fa fa-map-o"></i>Location in Google Map</p>

                                <div class="map--wrapper">
                                    <div data-map-latitude="23.790546" data-map-longitude="90.375583" data-map-zoom="6" data-map-marker="[[23.790546, 90.375583]]"></div>
                                </div>
                            </div>
                        </div>

                        <div class="post--content">
                            {{$article->content}}
                        </div>
                    </div>
                    <!-- Post Item End -->
            
                    <!-- Advertisement Start -->
                    <div class="ad--space pd--20-0-40">
                        <a href="#">
                        </a>
                    </div>

                    <!-- Post Social Start -->
                    <div class="post--social pbottom--30">
                        <span class="title"><i class="fa fa-share-alt"></i></span>
                        
                        <!-- Social Widget Start -->
                        <div class="social--widget style--4">
                            <ul class="nav">
                                <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/?lang=vi"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://www.google.com/"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="https://chat.openai.com/"><i class="fa fa-rss"></i></a></li>
                                <li><a href="https://www.youtube.com/"><i class="fa fa-youtube-play"></i></a></li>
                            </ul>
                        </div>
                        <!-- Social Widget End -->
                    </div>
                    <!-- Post Social End -->

                    <!-- Post Author Info Start -->
                    <div class="post--author-info clearfix">
                        <div class="img">
                            <div class="vc--parent">
                                <div class="vc--child">
                                    <a href="author.html" class="btn-link">
                                        <img src="/images/download.jpg" alt="" >
                                        <p class="name">Karla Gleichauf</p>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="info">
                            <h2 class="h4">{{$author->searchAuthorIdArticles($article -> id)[0]->name}}</h2>

                            <div class="content">
                                <p>{{$author->searchAuthorIdArticles($article -> id)[0]->bio}}</p>
                            </div>

                            <ul class="social nav">
                                <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/?lang=vi"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://www.google.com/"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="https://chat.openai.com/"><i class="fa fa-rss"></i></a></li>
                                <li><a href="https://www.youtube.com/"><i class="fa fa-youtube-play"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Post Author Info End -->

                    <!-- Post Nav Start -->
                    <div class="post--nav">
                        <h3 class="mb-3">Bài viết liên quan đến tác giả</h3>
                        <ul class="nav row">
                            @foreach ($articles ->articlesAuthor($author->searchAuthorIdArticles($article -> id)[0]->id) as $articleAuthor)
                          
                            <li class="col-xs-6 ptop--30 pbottom--30">
                                <!-- Post Item Start -->
                                <div class="post--item">
                                    <div class="post--img">
                                        <a href="#" class="thumb"><img src="/images/{{$articleAuthor->img}}" alt=""></a>

                                        <div class="post--info">
                                            <ul class="nav meta">
                                                <li><a href="#">{{$author->searchAuthorIdArticles($article -> id)[0]->name}}</a></li>
                                                <li><a href="#">Yeasterday 03:52 pm</a></li>
                                            </ul>

                                            <div class="title">
                                                <h3 class="h4"><a href="/auth/detail/{{$articleAuthor->id}}" class="btn-link">{{$articleAuthor->title}}</a></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Post Item End -->
                            </li>
                    
                        @endforeach
                        </ul>
                    </div>
                    <!-- Post Nav End -->

                   

                    <!-- Comment List Start -->
                    <div class="comment--list pd--30-0">
                        <!-- Post Items Title Start -->
                        <div class="post--items-title">
                            <h2 class="h4">{{count($comment->getComment($article -> id))}} Comments</h2>

                            <i class="icon fa fa-comments-o"></i>
                        </div>
                        <!-- Post Items Title End -->

                        <ul class="comment--items nav">
                            <li>
                                <!-- Comment Item Start -->
                                <div class="comment--item clearfix">
                                   @foreach ($comment->getComment($article -> id) as $value)
                                    
                                    <div class="comment--info">
                                        <h3>{{($value->name)}}</h3>
                                        <div class="comment--content">
                                            <p>{{$value->comment}}</p>
                                        </div>
                                    </div>
                                    
                                   @endforeach
                                        
                                </div>
                                <!-- Comment Item End -->
                            </li>
                        </ul>
                    </div>
                    <!-- Comment List End -->

                    <!-- Comment Form Start -->
                    <div class="comment--form pd--30-0">
                        <!-- Post Items Title Start -->
                        <div class="post--items-title">
                            <h2 class="h4">Leave A Comment</h2>

                            <i class="icon fa fa-pencil-square-o"></i>
                        </div>
                        <!-- Post Items Title End -->

                        <div class="comment-respond">


                            {{-- {{route('auth.store')}} --}}
                            <form action="/createCMT/<?php if(empty($_SESSION['id_user'])) echo 0; else echo $_SESSION['id_user']?>{{$article->id}}" method="POST" data-form="validate">
                                @csrf
                                <p>Don’t worry ! Your email address will not be published. Required fields are marked (*).</p>
                                <input type="hidden" name="article_id" value="{{$article->id}}">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>
                                            <span>Comment *</span>
                                            <textarea name="comment" class="form-control" required></textarea>
                                        </label>
                                    </div>


                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">Post a Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Comment Form End -->
                </div>
            </div>
            <!-- Main Content End -->

            <!-- Main Sidebar Start -->
            <div class="main--sidebar col-md-4 ptop--30 pbottom--30" data-sticky-content="true">
                <div class="sticky-content-inner">
                    <!-- Widget Start -->
                    <div class="widget">
                        <!-- Ad Widget Start -->
                        <div class="ad--widget">
                            <a href="#">
                               
                            </a>
                        </div>
                        <!-- Ad Widget End -->
                    </div>
                    <!-- Widget End -->

                    <!-- Widget Start -->
                    <div class="widget">
                        <div class="widget--title">
                            <h2 class="h4">Stay Connected</h2>
                            <i class="icon fa fa-share-alt"></i>
                        </div>

                        <!-- Social Widget Start -->
                        <div class="social--widget style--1">
                            <ul class="nav">
                                <li class="facebook">
                                    <a href="#">
                                        <span class="icon"><i class="fa fa-facebook-f"></i></span>
                                        <span class="count">521</span>
                                        <span class="title">Likes</span>
                                    </a>
                                </li>
                                <li class="twitter">
                                    <a href="#">
                                        <span class="icon"><i class="fa fa-twitter"></i></span>
                                        <span class="count">3297</span>
                                        <span class="title">Followers</span>
                                    </a>
                                </li>
                                <li class="google-plus">
                                    <a href="#">
                                        <span class="icon"><i class="fa fa-google-plus"></i></span>
                                        <span class="count">596282</span>
                                        <span class="title">Followers</span>
                                    </a>
                                </li>
                                <li class="rss">
                                    <a href="#">
                                        <span class="icon"><i class="fa fa-rss"></i></span>
                                        <span class="count">521</span>
                                        <span class="title">Subscriber</span>
                                    </a>
                                </li>
                                <li class="vimeo">
                                    <a href="#">
                                        <span class="icon"><i class="fa fa-vimeo"></i></span>
                                        <span class="count">3297</span>
                                        <span class="title">Followers</span>
                                    </a>
                                </li>
                                <li class="youtube">
                                    <a href="#">
                                        <span class="icon"><i class="fa fa-youtube-square"></i></span>
                                        <span class="count">596282</span>
                                        <span class="title">Subscriber</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- Social Widget End -->
                    </div>
                    <!-- Widget End -->

                    <!-- Widget Start -->
                    <div class="widget">
                        <div class="widget--title">
                            <h2 class="h4">Get Newsletter</h2>
                            <i class="icon fa fa-envelope-open-o"></i>
                        </div>

                        <!-- Subscribe Widget Start -->
                        <div class="subscribe--widget">
                            <div class="content">
                                <p>Subscribe to our newsletter to get  latest news, popular news and exclusive updates.</p>
                            </div>

                            <form action="https://themelooks.us13.list-manage.com/subscribe/post?u=79f0b132ec25ee223bb41835f&id=f4e0e93d1d" method="post" name="mc-embedded-subscribe-form" target="_blank" data-form="mailchimpAjax">
                                <div class="input-group">
                                    <input type="email" name="EMAIL" placeholder="E-mail address" class="form-control" autocomplete="off" required>

                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-lg btn-default active"><i class="fa fa-paper-plane-o"></i></button>
                                    </div>
                                </div>

                                <div class="status"></div>
                            </form>
                        </div>
                        <!-- Subscribe Widget End -->
                    </div>
                    <!-- Widget End -->

                    <!-- Widget Start -->
                    <div class="widget">
                        <div class="widget--title">
                            <h2 class="h4">Featured News</h2>
                            <i class="icon fa fa-newspaper-o"></i>
                        </div>

                        <!-- List Widgets Start -->
                        <div class="list--widget list--widget-1">
                            <div class="list--widget-nav" data-ajax="tab">
                                <ul class="nav nav-justified">
                                    <li>
                                        <a href="#" data-ajax-action="load_widget_hot_news">Hot News</a>
                                    </li>
                                    <li class="active">
                                        <a href="#" data-ajax-action="load_widget_trendy_news">Trendy News</a>
                                    </li>
                                    <li>
                                        <a href="#" data-ajax-action="load_widget_most_watched">Most Watched</a>
                                    </li>
                                </ul>
                            </div>

                            <!-- Post Items Start -->
                            <div class="post--items post--items-3" data-ajax-content="outer">
                                <ul class="nav" data-ajax-content="inner">
                                    <li>
                                        <!-- Post Item Start -->
                                        <div class="post--item post--layout-3">
                                            <div class="post--img">
                                                <a href="#" class="thumb"></a>

                                                <div class="post--info">
                                                    <ul class="nav meta">
                                                        <li><a href="#">Ninurta</a></li>
                                                        <li><a href="#">16 April 2017</a></li>
                                                    </ul>

                                                    <div class="title">
                                                        <h3 class="h4"><a href="#" class="btn-link">Long established fact that a reader will be distracted</a></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Post Item End -->
                                    </li>
                                    <li>
                                        <!-- Post Item Start -->
                                        <div class="post--item post--layout-3">
                                            <div class="post--img">
                                                <a href="#" class="thumb"></a>

                                                <div class="post--info">
                                                    <ul class="nav meta">
                                                        <li><a href="#">Orcus</a></li>
                                                        <li><a href="#">16 April 2017</a></li>
                                                    </ul>

                                                    <div class="title">
                                                        <h3 class="h4"><a href="#" class="btn-link">Long established fact that a reader will be distracted</a></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Post Item End -->
                                    </li>
                                    <li>
                                        <!-- Post Item Start -->
                                        <div class="post--item post--layout-3">
                                            <div class="post--img">
                                                <a href="#" class="thumb"></a>

                                                <div class="post--info">
                                                    <ul class="nav meta">
                                                        <li><a href="#">Rahab</a></li>
                                                        <li><a href="#">16 April 2017</a></li>
                                                    </ul>

                                                    <div class="title">
                                                        <h3 class="h4"><a href="#" class="btn-link">Long established fact that a reader will be distracted</a></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Post Item End -->
                                    </li>
                                    <li>
                                        <!-- Post Item Start -->
                                        <div class="post--item post--layout-3">
                                            <div class="post--img">
                                                <a href="#" class="thumb"></a>

                                                <div class="post--info">
                                                    <ul class="nav meta">
                                                        <li><a href="#">Tannin</a></li>
                                                        <li><a href="#">16 April 2017</a></li>
                                                    </ul>

                                                    <div class="title">
                                                        <h3 class="h4"><a href="#" class="btn-link">Long established fact that a reader will be distracted</a></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Post Item End -->
                                    </li>
                                </ul>

                                <!-- Preloader Start -->
                                <div class="preloader bg--color-0--b" data-preloader="1">
                                    <div class="preloader--inner"></div>
                                </div>
                                <!-- Preloader End -->
                            </div>
                            <!-- Post Items End -->
                        </div>
                        <!-- List Widgets End -->
                    </div>
                    <!-- Widget End -->

                    <!-- Widget Start -->
                    <div class="widget">
                        <div class="widget--title">
                            <h2 class="h4">Advertisement</h2>
                            <i class="icon fa fa-bullhorn"></i>
                        </div>

                        <!-- Ad Widget Start -->
                        <div class="ad--widget">
                            <a href="#">
                                
                            </a>
                        </div>
                        <!-- Ad Widget End -->
                    </div>
                    <!-- Widget End -->

                    <!-- Widget Start -->
                    <div class="widget">
                        <div class="widget--title" data-ajax="tab">
                            <h2 class="h4">Voting Poll (Checkbox)</h2>

                            <div class="nav">
                                <a href="#" class="prev btn-link" data-ajax-action="load_prev_poll_widget">
                                    <i class="fa fa-long-arrow-left"></i>
                                </a>

                                <span class="divider">/</span>

                                <a href="#" class="next btn-link" data-ajax-action="load_next_poll_widget">
                                    <i class="fa fa-long-arrow-right"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Poll Widget Start -->
                        <div class="poll--widget" data-ajax-content="outer">
                            <ul class="nav" data-ajax-content="inner">
                                <li class="title">
                                    <h3 class="h4">Which was the best Football World Cup ever in your opinion?</h3>
                                </li>

                                <li class="options">
                                    <form action="#">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="option-1">
                                                <span>Brazil 2014</span>
                                            </label>

                                            <p>65%<span style="width: 65%;"></span></p>
                                        </div>

                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="option-2">
                                                <span>South Africa 2010</span>
                                            </label>

                                            <p>28%<span style="width: 28%;"></span></p>
                                        </div>

                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="option-2">
                                                <span>Germany 2006</span>
                                            </label>

                                            <p>07%<span style="width: 07%;"></span></p>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Vote Now</button>
                                    </form>
                                </li>
                            </ul>

                            <!-- Preloader Start -->
                            <div class="preloader bg--color-0--b" data-preloader="1">
                                <div class="preloader--inner"></div>
                            </div>
                            <!-- Preloader End -->
                        </div>
                        <!-- Poll Widget End -->
                    </div>
                    <!-- Widget End -->

                    <!-- Widget Start -->
                    <div class="widget">
                        <div class="widget--title" data-ajax="tab">
                            <h2 class="h4">Voting Poll (Radio)</h2>

                            <div class="nav">
                                <a href="#" class="prev btn-link" data-ajax-action="load_prev_poll_widget">
                                    <i class="fa fa-long-arrow-left"></i>
                                </a>

                                <span class="divider">/</span>

                                <a href="#" class="next btn-link" data-ajax-action="load_next_poll_widget">
                                    <i class="fa fa-long-arrow-right"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Poll Widget Start -->
                        <div class="poll--widget" data-ajax-content="outer">
                            <ul class="nav" data-ajax-content="inner">
                                <li class="title">
                                    <h3 class="h4">Do you think the cost of sending money to mobile phone should be reduced?</h3>
                                </li>

                                <li class="options">
                                    <form action="#">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="option-1">
                                                <span>Yes</span>
                                            </label>

                                            <p>65%<span style="width: 65%;"></span></p>
                                        </div>

                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="option-1">
                                                <span>No</span>
                                            </label>

                                            <p>28%<span style="width: 28%;"></span></p>
                                        </div>

                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="option-1">
                                                <span>Average</span>
                                            </label>

                                            <p>07%<span style="width: 07%;"></span></p>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Vote Now</button>
                                    </form>
                                </li>
                            </ul>

                            <!-- Preloader Start -->
                            <div class="preloader bg--color-0--b" data-preloader="1">
                                <div class="preloader--inner"></div>
                            </div>
                            <!-- Preloader End -->
                        </div>
                        <!-- Poll Widget End -->
                    </div>
                    <!-- Widget End -->

                    <!-- Widget Start -->
                    <div class="widget">
                        <!-- Ad Widget Start -->
                        <div class="ad--widget">
                            <div class="row">
                                <div class="col-sm-6">
                                    <a href="#">
                                    </a>
                                </div>

                                <div class="col-sm-6">
                                    <a href="#">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Ad Widget End -->
                    </div>
                    <!-- Widget End -->

                    <!-- Widget Start -->
                    <div class="widget">
                        <div class="widget--title" data-ajax="tab">
                            <h2 class="h4">Readers Opinion</h2>

                            <div class="nav">
                                <a href="#" class="prev btn-link" data-ajax-action="load_prev_readers_opinion_widget">
                                    <i class="fa fa-long-arrow-left"></i>
                                </a>

                                <span class="divider">/</span>

                                <a href="#" class="next btn-link" data-ajax-action="load_next_readers_opinion_widget">
                                    <i class="fa fa-long-arrow-right"></i>
                                </a>
                            </div>
                        </div>

                        <!-- List Widgets Start -->
                        <div class="list--widget list--widget-2" data-ajax-content="outer">
                            <!-- Post Items Start -->
                            <div class="post--items post--items-3">
                                <ul class="nav" data-ajax-content="inner">
                                    <li>
                                        <!-- Post Item Start -->
                                        <div class="post--item post--layout-3">
                                            <div class="post--img">
                                                <span class="thumb">
                                                </span>

                                                <div class="post--info">
                                                    <div class="title">
                                                        <h3 class="h4">Long established fact that a reader will be distracted</h3>
                                                    </div>

                                                    <ul class="nav meta">
                                                        <li><span>by Ninurta</span></li>
                                                        <li><span>16 April 2017</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Post Item End -->
                                    </li>
                                    <li>
                                        <!-- Post Item Start -->
                                        <div class="post--item post--layout-3">
                                            <div class="post--img">
                                                <span class="thumb">
                                                </span>

                                                <div class="post--info">
                                                    <div class="title">
                                                        <h3 class="h4">Long established fact that a reader will be distracted</h3>
                                                    </div>

                                                    <ul class="nav meta">
                                                        <li><span>by Ninurta</span></li>
                                                        <li><span>16 April 2017</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Post Item End -->
                                    </li>
                                    <li>
                                        <!-- Post Item Start -->
                                        <div class="post--item post--layout-3">
                                            <div class="post--img">

                                                <div class="post--info">
                                                    <div class="title">
                                                        <h3 class="h4">Long established fact that a reader will be distracted</h3>
                                                    </div>

                                                    <ul class="nav meta">
                                                        <li><span>by Ninurta</span></li>
                                                        <li><span>16 April 2017</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Post Item End -->
                                    </li>
                                </ul>

                                <!-- Preloader Start -->
                                <div class="preloader bg--color-0--b" data-preloader="1">
                                    <div class="preloader--inner"></div>
                                </div>
                                <!-- Preloader End -->
                            </div>
                            <!-- Post Items End -->
                        </div>
                        <!-- List Widgets End -->
                    </div>
                    <!-- Widget End -->

                    <!-- Widget Start -->
                    <div class="widget">
                        <div class="widget--title" data-ajax="tab">
                            <h2 class="h4">Editors Choice</h2>

                            <div class="nav">
                                <a href="#" class="prev btn-link" data-ajax-action="load_prev_editors_choice_widget">
                                    <i class="fa fa-long-arrow-left"></i>
                                </a>

                                <span class="divider">/</span>

                                <a href="#" class="next btn-link" data-ajax-action="load_next_editors_choice_widget">
                                    <i class="fa fa-long-arrow-right"></i>
                                </a>
                            </div>
                        </div>

                        <!-- List Widgets Start -->
                        <div class="list--widget list--widget-1" data-ajax-content="outer">
                            <!-- Post Items Start -->
                            <div class="post--items post--items-3">
                                <ul class="nav" data-ajax-content="inner">
                                    <li>
                                        <!-- Post Item Start -->
                                        <div class="post--item post--layout-3">
                                            <div class="post--img">

                                                <div class="post--info">
                                                    <ul class="nav meta">
                                                        <li><a href="#">Ninurta</a></li>
                                                        <li><a href="#">16 April 2017</a></li>
                                                    </ul>

                                                    <div class="title">
                                                        <h3 class="h4"><a href="#" class="btn-link">Long established fact that a reader will be distracted</a></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Post Item End -->
                                    </li>
                                    <li>
                                        <!-- Post Item Start -->
                                        <div class="post--item post--layout-3">
                                            <div class="post--img">
                                                
                                                <div class="post--info">
                                                    <ul class="nav meta">
                                                        <li><a href="#">Orcus</a></li>
                                                        <li><a href="#">16 April 2017</a></li>
                                                    </ul>

                                                    <div class="title">
                                                        <h3 class="h4"><a href="#" class="btn-link">Long established fact that a reader will be distracted</a></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Post Item End -->
                                    </li>
                                    <li>
                                        <!-- Post Item Start -->
                                        <div class="post--item post--layout-3">
                                            <div class="post--img">
                                                
                                                <div class="post--info">
                                                    <ul class="nav meta">
                                                        <li><a href="#">Rahab</a></li>
                                                        <li><a href="#">16 April 2017</a></li>
                                                    </ul>

                                                    <div class="title">
                                                        <h3 class="h4"><a href="#" class="btn-link">Long established fact that a reader will be distracted</a></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Post Item End -->
                                    </li>
                                    <li>
                                        <!-- Post Item Start -->
                                        <div class="post--item post--layout-3">
                                            <div class="post--img">
                                               
                                                <div class="post--info">
                                                    <ul class="nav meta">
                                                        <li><a href="#">Tannin</a></li>
                                                        <li><a href="#">16 April 2017</a></li>
                                                    </ul>

                                                    <div class="title">
                                                        <h3 class="h4"><a href="#" class="btn-link">Long established fact that a reader will be distracted</a></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Post Item End -->
                                    </li>
                                </ul>

                                <!-- Preloader Start -->
                                <div class="preloader bg--color-0--b" data-preloader="1">
                                    <div class="preloader--inner"></div>
                                </div>
                                <!-- Preloader End -->
                            </div>
                            <!-- Post Items End -->
                        </div>
                        <!-- List Widgets End -->
                    </div>
                    <!-- Widget End -->
                </div>
            </div>
            <!-- Main Sidebar End -->
        </div>
    </div>
</div>
@endsection
