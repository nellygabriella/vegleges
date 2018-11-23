@extends('main')
@section('title','|Edit Blog')

@section('stylesheets')
    {!!Html::style('css/parsley.css')!!}
    {!!Html::style('css/select2.min.css')!!}
@endsection

@section('content')

    <div class="row">

        {!!Form::model($news,['route'=>['news.update',$news->id],'method'=>'PUT', 'files' =>true])!!}
            <div class="col-md-8">
                {{Form::label('title','Tile:')}}
                {{Form::text('title',null,["class"=>'form-control input-lg'])}}

                {{Form::label('slug','Slug',['class'=>'form-spacing-top'])}}
                {{Form::text('slug',null,['class'=>'form-control input-lg form-spacing-top'])}}

                {{ Form::label('tags', 'Tags:', ['class' => 'form-spacing-top']) }}
                {{ Form::select('tags[]', $tags, null, ['class' => 'form-controlselect2-multi', 'multiple' => 'multiple']) }}

                {{ Form::label('featured_image', 'Kép cseréje:', ['class' => 'form-spacing-top']) }}
                {{ Form::file('featured_image')}}

                {{Form::label('body',"Body",['class'=>'form-spacing-top'])}}
                {{Form::textarea('body',null,['class'=>'form-control'])}}
            </div>
        
        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Készült: </dt>
                    <dd>{{date('M j, Y h:is',strtotime($news->created_at))}}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Módositva: </dt>
                    <dd>{{date('M j, Y h:is',strtotime($news->updated_at))}}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!!Html::linkRoute('news.show', 'Mégse', array($news->id),array('class'=>'btn btn-primary btn-block'))!!}
                    </div>
                    <div class="col-sm-6">
                        {{Form::submit('Mentés',['class'=>'btn btn-succes btn-block'])}}
                    </div>
                </div>
            </div>
        </div>

        {!!Form::close()!!}
    </div>

@stop


@section('scripts')

    {!!Html::script('js/select2.min.js')!!}

    <scripts type="text/javascript">
    
        $('.select2-multi').select2();
        $('.select2-multi').select2().val({!! json_encode($news->tags()->allRelatedIds())!!}).trigger('change');
    </scripts>

@endsection