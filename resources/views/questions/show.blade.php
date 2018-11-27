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
                            <h4>{{ $question ->question }}</h4>
                            
                            <hr>
                            <div class="text-justify">
                                {!!$question->body!!}
                            </div>
                            <hr>
                            <div class="tags">
                                @foreach ($question->tags as $tag)
                                    <label class="badge badge-warning">{{ $tag->name }}</label>
                                @endforeach
                            </div>
                        </div>
                </div>
                </div>
            </div>
            
            
            <div class="col-lg-4 grid-margin stretch-card">
                <div class="card" style="margin-right:50px;">
                    <div class="card-body">

                        <dl class="dl-horizontal">
                            <dt>URL: </dt>
                            <dd><a href="{{ route('post.single', $question->slug) }}">{{ route('post.single', $question->slug) }}</a></dd>
                        </dl>

                        <dl class="dl-horizontal">
                            <dt>Készült: </dt>
                            <dd>{{date('Y, M j',strtotime($question->created_at))}}</dd>
                        </dl>

                        <dl class="dl-horizontal">
                            <dt>Módositva: </dt>
                            <dd>{{date('Y, M j',strtotime($question->updated_at))}}</dd>
                        </dl>

                        <hr>

                        <div class="row">
                            <div class="col-sm-6">
                                {!!Html::linkRoute('questions.edit', 'Szerkeszt', array($question->id),array('class'=>'btn btn-secondary btn-fw'))!!}
                            </div>
                            <div class="col-sm-6">
        
                                {!! Form::open(['route'=>['questions.destroy',$question->id],'method' => 'DELETE']) !!}
        
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