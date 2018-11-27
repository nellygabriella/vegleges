@extends('layouts.app')

@section('styles')

{!!Html::style('css/parsley.css')!!}
{!!Html::style('css/select2.min.css')!!}
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

<script>
	tinymce.init({
		selector: 'textarea',
		plugins: 'link code',
		menubar: false
	});
</script>
@endsection

@section('content')

    @include('partials._dashboard')

    <div class="content-wrapper">
        <div class="row">

            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Módosítás</h4>
                            {!!Form::model($job,['route'=>['jobs.update',$job->id],'method'=>'PUT', 'files' =>true])!!}

                            <div class="form-group">
                                {{Form::label('position','Pozíció:')}}
                                {{Form::text('position',null,["class"=>'form-control input-lg'])}}
                            </div>

                            <div class="form-group">
                                {{Form::label('company','Cég:')}}
                                {{Form::text('company',null,["class"=>'form-control input-lg'])}}
                            </div>

                            <div class="form-group">
                                {{Form::label('city','Város:')}}
                                {{Form::text('city',null,["class"=>'form-control input-lg'])}}
                            </div>

                            <div class="form-group">
                                {{Form::label('slug','Slug',['class'=>'form-spacing-top'])}}
                                {{Form::text('slug',null,['class'=>'form-control input-lg form-spacing-top'])}}
                            </div>

                            <div class="form-group">
                                {{ Form::label('tags', 'Tags:', ['class' => 'form-spacing-top']) }}
                                {{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}
                            </div>

                            <div class="form-group">
                                {{Form::label('body',"Body",['class'=>'form-spacing-top'])}}
                                {{Form::textarea('body',null,['class'=>'form-control'])}}
                            </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    
                        <table class="table table-hover">
                            
                            <tbody>
                            <tr>
                                <td>Készült: </td>
                                <td>{{date('Y, M j',strtotime($job->created_at))}}</td>
                            </tr>
                            <tr>
                                <td>Módositva: </td>
                                <td>{{date('Y, M j',strtotime($job->updated_at))}}</td>
                            </tr>
                            <tr>
                                <td>{!!Html::linkRoute('jobs.show', 'Mégse', array($job->id),array('class'=>'btn btn-primary btn-fw'))!!}</td>
                                <td>{{Form::submit('Mentés',['class'=>'btn btn-success btn-fw'])}}</td>
                            </tr>
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
    
@stop


@section('scripts')

{!!Html::script('js/parsley.min.js')!!}
{!!Html::script('js/select2.min.js')!!}

<script type="text/javascript">
    $('.select2-multi').select2();
    $('.select2-multi').select2().val({!! json_encode($job->tags()->allRelatedIds())!!}).trigger('change');
</script>


@endsection