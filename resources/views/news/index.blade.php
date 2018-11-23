@extends('main')

@section('title','|Forum')
    
    @section('stylesheets')
        <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/css/news.css" />
        <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/css/index.css" />
    @endsection

    <body>
        <div class="super-container">

            <!--Home-->
            @section('hometitle','Hírek')

            @section('content')

            <!--News-->
            <div class="news">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8">

                            <div class="news-posts">

                                @foreach($news as $n)
                                <!--News Post-->
                                    <div class="news-post">
                                        <div class="news-post-image">
                                            <img src="images/news_1.jpg">
                                        </div>
                                        <div class="news-post-top d-flex flex-column flex-sm-row">
                                            <div class="news-post-date-container">
                                                <div class="news-post-date d-flex flex-column align-items-center justify-content-center">
                                                    <div>{{date('j',strtotime($n->created_ad))}}</div>
                                                    <div>{{date('M',strtotime($n->created_ad))}}</div>
                                                </div>
                                            </div>
                                            <div class="news-post-title-container">
                                                <div class="news-post-title">
                                                    <a href="{{route('news.show',$n->id)}}">{{$n->title}}</a>
                                                </div>
                                                <div class="news-post-meta">
                                                    <span class="news-post-author"><a href="#">Szerző</a></span>
                                                    <span>|</span>
                                                    <span class="news-post-comments"><a href="#">3 Comments</a></spn>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="news-post-text">
                                            <p>{{substr($n->body,0,200)}}{{strlen($n->body)>200?"...":""}}</p>
                                        </div>
                                        <div class="news-post-button text-center trans_200">
                                            <a href="#">Több</a>
                                        </div>
                                    </div>
                                    @endforeach

                            </div>

                            <!--Page Nav-->
                            <div class="news-page-nav">
                                <ul>
                                    <li class="active text-center trans_200">{{ $news->links() }}</li>
                                </ul>
                            </div>
                            
                        </div>

                        <div class="col-lg-4">
                            <div class="sidebar">

                                <div class="new-post-button">
                                    <div class="button new-post text-center trans_200"><a href="{{route('news.create')}}">Új post</a></div>
                                </div>

                                <div class="sidebar-section">
                                    <div class="sidebar-section-title">
                                        <h3>Archives</h3>
                                    </div>
                                    <ul class="sidebar-list">
                                        <li class="sidebar-list-item"><a href="#">Design Courses</a></li>
                                        <li class="sidebar-list-item"><a href="#">Design Courses</a></li>
                                        <li class="sidebar-list-item"><a href="#">Design Courses</a></li>
                                        <li class="sidebar-list-item"><a href="#">Design Courses</a></li>
                                        <li class="sidebar-list-item"><a href="#">Design Courses</a></li>
                                    </ul>
                                </div>

                                <div class="sidebar-section">
                                    <div class="sidebar-section-title">
                                        <h3>Latest posts</h3>
                                    </div>

                                    <div class="latest_posts">

                                        <div class="latest-post">
                                            <div class="latest-post-image">
                                                <img src="images/latest_1.jpg">
                                            </div>
                                            <div class="latest-post-title"><a href="#">Cím</a></div>
                                            <div class="latest-post-meta">
                                                <span class="latest_post_author"><a href="#">By Christian Smith</a></span>
                                                <span>|</span>
                                                <span class="latest_post_comments"><a href="#">3 Comments</a></span>
                                            </div>
                                        </div>

                                        <div class="latest-post">
                                            <div class="latest-post-image">
                                                <img src="images/latest_1.jpg">
                                            </div>
                                            <div class="latest-post-title"><a href="#">Cím</a></div>
                                            <div class="latest-post-meta">
                                                <span class="latest_post_author"><a href="#">By Christian Smith</a></span>
                                                <span>|</span>
                                                <span class="latest_post_comments"><a href="#">3 Comments</a></span>
                                            </div>
                                        </div>

                                        <div class="latest-post">
                                            <div class="latest-post-image">
                                                <img src="images/latest_1.jpg">
                                            </div>
                                            <div class="latest-post-title"><a href="#">Cím</a></div>
                                            <div class="latest-post-meta">
                                                <span class="latest_post_author"><a href="#">By Christian Smith</a></span>
                                                <span>|</span>
                                                <span class="latest_post_comments"><a href="#">3 Comments</a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="sidebar-section">
                                    <div class="sidebar-section-title">
                                        <h3>Tags</h3>
                                    </div>
                                    <div class="tags d-flex flex-row flex-wrap">
                                        <div class="tag"><a href="#">Course</a></div>
                                        <div class="tag"><a href="#">Course</a></div>
                                        <div class="tag"><a href="#">Course</a></div>
                                        <div class="tag"><a href="#">Course</a></div>
                                        <div class="tag"><a href="#">Course</a></div>
                                        <div class="tag"><a href="#">Course</a></div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                   
                </div>

            </div>

        </div>
    </body>

@endsection