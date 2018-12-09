@extends('page')



@section('stylesheets')
{!!Html::style('css/layouts/post_single.css')!!}
{!!Html::style('css/layouts/post_single_responsive.css')!!}
@endsection

@section('content')


<div class="news">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                                
                        <div class="news_post_container">
                            <!-- News Post -->
                            <div class="news_post">
                                <div class="news_post_top d-flex flex-column flex-sm-row">
                                    <div class="news_post_date_container">
                                        <div class="news_post_date d-flex flex-column align-items-center justify-content-center">
                                            <div>{{ date('j', strtotime($note->created_at)) }}</div>
                                            <div>{{ date('M', strtotime($note->created_at)) }}</div>
                                        </div>
                                    </div>
                                    <div class="news_post_title_container">
                                        <div class="news_post_title">
                                            <h1>{{ $note->title }}</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="news_post_text">
                                    {!!$note->body!!}
                                </div>
                            </div>
                            <div class="col-lg-2">
                                    <p>{{$note->original_filename}}</p>
                                            <div class="button button_color_1 text-center trans_200"><a href="{!! route('getfile',$note->filename)!!}" target='_blank'>Letöltöm</a></div>
                            </div>
                        </div>
                        
                </div>
            </div>
        </div>
</div>
        
@endsection

