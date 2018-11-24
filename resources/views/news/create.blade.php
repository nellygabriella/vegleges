@extends('main')

@section('stylesheets')
    {!!Html::style('css/parsley.css')!!}
    {!!Html::style('css/select2.min.css')!!}
    <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'code image link'
        });
    </script>
@endsection

    <body>
        <div class="super-container">

        
        @section('content')
        <div class="col-lg-8">
            <div class="create-post">
            {!! Form::open(array('route' => 'news.store','data-parsley-validate' => '', 'files'=>true)) !!}

                {{Form::label('title', 'Title: ')}}
                {{Form::text('title', null, array('class'=>'form-control', 'required'=>'', 'maxlength'=>'255'))}}

                {{Form::label('slug','Slug')}}
                {{Form::text('slug',null,array('class'=>'form-control', 'required'=>'', 'minlength'=>'5','maxlength'=>'255'))}}

                {{ Form::label('tags', 'Tags:') }}
				<select class="form-control select2-multi" name="tags[]" multiple="multiple">
					@foreach($tags as $tag)
						<option value='{{ $tag->id }}'>{{ $tag->name }}</option>
					@endforeach
                </select>

                {{ Form::label('featured_image', 'Kiemelt kép:')}}
                {{ Form::file('featured_image')}}

                {{Form::label('body','Post Body: ')}}
                {{Form::textarea('body',null,array('class'=>'form-control','required'=>''))}}

                {{Form::submit('Create Post', array('class'=>'btn btn-success btn-lg btn'))}}

            {!! Form::close() !!}
            </div>
        </div>

        </div>
    </body>
@endsection

@section('scripts')

{!!Html::script('js/parsley.min.js')!!}
{!!Html::script('js/select2.min.js')!!}

<script type="text/javascript">
    $('.select2-multi').select2();
</script>

@endsection