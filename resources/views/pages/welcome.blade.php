@extends('main')

@section('title','| Welcome')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/css/main.css" />
@endsection

        <div class="home">
            <div class="slider-container">
                <div class="slider owl-carousel">

                    <!-- Slide -->
                    <div class="slide">
                        <div class="slide-background" style="background-image:url(images/slider_background.jpg)"><div>
                        <div class="slide-container d-flex flex-column align-items-center justify-content-center">
                            <div class="slide-content text-center">
                                <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">Get your <span>Education</span> today! </h1>
                            </div>
                        </div>
                    </div>

                    <div class="slide">
                        <div class="slide-background" style="background-image:url(images/slider_background.jpg)"><div>
                        <div class="slide-container d-flex flex-column align-items-center justify-content-center">
                            <div class="slide-content text-center">
                                <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">Get your <span>Education</span> today! </h1>
                            </div>
                        </div>
                    </div>

                    <div class="slide">
                        <div class="slide-background" style="background-image:url(images/slider_background.jpg)"><div>
                        <div class="slide-container d-flex flex-column align-items-center justify-content-center">
                            <div class="slide-content text-center">
                                <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">Get your <span>Education</span> today! </h1>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="slider-left slider-nav trans_200"><span class="trans_200">prev</span></div>
                <div class="slider-right slider-nav trans_200"><span class="trans_200">next</span></div>
            </div>
        </div>

        <div class="boxes">
            <div class="boxes-inner">
                <div class="boxes-container">
                    <div class="row">

                         <div class="col-lg-4 box-col">
                             <div class="box d-flex flex-row align-items-center justify-content-start">
                                 <img src="images/earth-globe.svg" class="svg" alt=" ">
                                 <div class="box-content">
                                     <h2 class="box-title">Online Courses</h2>
                                     <a href="courses.html" class="box-link">view more</a>
                                 </div>
                             </div>
                         </div>

                         <div class="col-lg-4 box-col">
                             <div class="box d-flex flex-row align-items-center justify-content-start">
                                 <img src="images/earth-globe.svg" class="svg" alt=" ">
                                 <div class="box-content">
                                     <h2 class="box-title">Online Courses</h2>
                                     <a href="courses.html" class="box-link">view more</a>
                                 </div>
                             </div>
                         </div>

                         <div class="col-lg-4 box-col">
                             <div class="box d-flex flex-row align-items-center justify-content-start">
                                 <img src="images/earth-globe.svg" class="svg" alt=" ">
                                 <div class="box-content">
                                     <h2 class="box-title">Online Courses</h2>
                                     <a href="courses.html" class="box-link">view more</a>
                                 </div>
                             </div>
                         </div>
                        
                    </div>
                </div>
            </div>
        </div>
        @section('content')
        <div class="popular page-section">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section-title text-center">
                            <h1>Népszerű jegyzetek</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 popular-box">
                    <div class="card">
                        <img class="card-img-top" src="images/course_1.jpg">
                        <div class="card-body text-center">
                            <div class="card-title"><a href="courses.html">A complete guide to design</a></div>
                            <div class="card-text">>Adobe Guide, Layes, Smart Objects etc...</div>
                        </div>
                    </div>
                </div>
            

                <div class="col-lg-4 popular-box">
                    <div class="card">
                        <img class="card-img-top" src="images/course_1.jpg">
                        <div class="card-body text-center">
                            <div class="card-title"><a href="courses.html">A complete guide to design</a></div>
                            <div class="card-text">>Adobe Guide, Layes, Smart Objects etc...</div>
                        </div>
                    </div>
                </div>
            
            
                <div class="col-lg-4 popular-box">
                    <div class="card">
                        <img class="card-img-top" src="images/course_1.jpg">
                        <div class="card-body text-center">
                            <div class="card-title"><a href="courses.html">A complete guide to design</a></div>
                            <div class="card-text">>Adobe Guide, Layes, Smart Objects etc...</div>
                        </div>
                    </div>
                </div>
                
        </div>

        <!--Events-->
        <div class="events page-section">
            <div class="container">
                
                <div class="row">
                    <div class="col">
                        <div class="section-title text-center">
                            <h1>Hírek/Események</h1>
                        </div>
                    </div>
                </div>

                <div class="event-items">


                    @foreach($news as $n)
                        <div class="row event-item">
                            <div class="col">
                                <div class="row d-flex flex-row align-items-end">

                                    <div class="col-lg-2 order-lg-1 order-2">
                                        <div class="event-date d-flex flex-column align-items-center justify-content-center">
                                            <div class="event-day">{{date('j ',strtotime($n->created_at))}}</div>
                                            <div class="event-month">{{date('M ',strtotime($n->created_at))}}</div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 order-lg-2 order-3">
                                        <div class="event-content">
                                            <div class="event-name"><a class="trans_200" href="{{ url('news/'.$n->slug) }}">{{$n->title}}</a></div>
                                            <p>{{substr($n->body,0,300)}}{{strlen($n->body)>300 ? "..." : ""</p>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 order-lg-3 order-1">
                                        <div class="event-image">
                                            <img src="images/event_1.jpg">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>    
@endsection