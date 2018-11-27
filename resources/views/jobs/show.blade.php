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
                            <h4>{{ $job->position }}</h4>
                            <hr>
                            <h5>Cég: </h5><p>{{ $job->company }}</p>
                            <h5>Város: </h5><p>{{ $job->city }}</p>
                            <hr>
                            <div class="text-justify">
                                {!!$job->body!!}
                            </div>
                            <hr>
                            <div class="tags">
                                @foreach ($job->tags as $tag)
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
                            <dd><a href="{{ route('post.single', $job->slug) }}">{{ route('post.single', $job->slug) }}</a></dd>
                        </dl>

                        <dl class="dl-horizontal">
                            <dt>Készült: </dt>
                            <dd>{{date('Y, M j',strtotime($job->created_at))}}</dd>
                        </dl>

                        <dl class="dl-horizontal">
                            <dt>Módositva: </dt>
                            <dd>{{date('Y, M j',strtotime($job->updated_at))}}</dd>
                        </dl>

                        <hr>

                        <div class="row">
                            <div class="col-sm-6">
                                {!!Html::linkRoute('jobs.edit', 'Szerkeszt', array($job->id),array('class'=>'btn btn-secondary btn-fw'))!!}
                            </div>
                            <div class="col-sm-6">
        
                                {!! Form::open(['route'=>['jobs.destroy',$job->id],'method' => 'DELETE']) !!}
        
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