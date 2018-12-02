@extends('layouts.app')

@section('styles')

{!!Html::style('css/parsley.css')!!}

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

<script>
	tinymce.init({
		selector: 'textarea',
		plugins: 'image media link tinydrive code imagetools',
		height: 450,
		toolbar: 'insertfile image link | code'
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
                            {!!Form::model($note,['route'=>['notes.update',$note->id],'method'=>'PUT', 'files' =>true])!!}

                            <div class="form-group">
                                {{Form::label('title','Tile:')}}
                                {{Form::text('title',null,["class"=>'form-control input-lg'])}}
                            </div>

                            <div class="form-group">
                                {{Form::label('slug','Slug',['class'=>'form-spacing-top'])}}
                                {{Form::text('slug',null,['class'=>'form-control input-lg form-spacing-top'])}}
                            </div>

                            

                            <div class="form-group">
                                {{ Form::label('filefield', 'Kép cseréje:', ['class' => 'form-spacing-top']) }}
                                {{ Form::file('filefield')}}
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
                                <td>{{date('Y, M j',strtotime($note->created_at))}}</td>
                            </tr>
                            <tr>
                                <td>Módositva: </td>
                                <td>{{date('Y, M j',strtotime($note->updated_at))}}</td>
                            </tr>
                            <tr>
                                <td>{!!Html::linkRoute('notes.show', 'Mégse', array($note->id),array('class'=>'btn btn-primary btn-fw'))!!}</td>
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


@endsection