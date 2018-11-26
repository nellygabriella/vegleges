@extends('layouts.app')


@section('styles')
    {!!Html::style('css/select2.min.css')!!}
@endsection

@section('content')

    @include('partials._dashboard')

    <div class="content-wrapper">
        <div class="row grid-margin">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title">A kész szöveg</h4>
                        <div id="summernoteExample">
                            <h4>{{ $news->title }}</h4>
                            <hr>
                            <img src="{{asset('images/'.$news->image)}}" alt="Akép nem jeleníthető meg" width="100%"/>
                            <hr>
                            <div class="text-justify">
                                {!!$news->body!!}
                            </div>
                            <hr>
                            <div class="tags">
                                @foreach ($news->tags as $tag)
                                    <label class="badge badge-warning">{{ $tag->name }}</label>
                                @endforeach
                            </div>
                        </div>
                </div>
                </div>
            </div>
            <div class="col-lg-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2><small>{{ $news->comments()->count() }} hozzászólás</small></h2>

                        <table id="order-listing" class="table" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Hozzászólás</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($news->comments as $comment)
                                    <tr>
                                        <td>{{ $comment->comment }}</td>
                                        <td><a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 grid-margin stretch-card">
                <div class="card" style="margin-right:50px;">
                    <div class="card-body">

                        <dl class="dl-horizontal">
                            <dt>URL: </dt>
                            <dd><a href="{{ route('post.single', $news->slug) }}">{{ route('post.single', $news->slug) }}</a></dd>
                        </dl>

                        <dl class="dl-horizontal">
                            <dt>Készült: </dt>
                            <dd>{{date('Y, M j',strtotime($news->created_at))}}</dd>
                        </dl>

                        <dl class="dl-horizontal">
                            <dt>Módositva: </dt>
                            <dd>{{date('Y, M j',strtotime($news->updated_at))}}</dd>
                        </dl>

                        <hr>

                        <div class="row">
                            <div class="col-sm-6">
                                {!!Html::linkRoute('news.edit', 'Szerkeszt', array($news->id),array('class'=>'btn btn-secondary btn-fw'))!!}
                            </div>
                            <div class="col-sm-6">
        
                                {!! Form::open(['route'=>['news.destroy',$news->id],'method' => 'DELETE']) !!}
        
                                {!! Form::submit('Törlés',['class'=>'btn btn-info btn-fw']) !!}
        
                                {!! Form::close() !!}
        
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>

@endsection