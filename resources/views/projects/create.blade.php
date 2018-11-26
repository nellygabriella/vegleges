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
			<div class="col-md-10 grid-margin stretch-card">
				<div class="card">
                <div class="card-body">
                  <h4 class="card-title">Új post</h4>
				  
					{!! Form::open(array('route' => 'projects.store','data-parsley-validate' => '', 'files'=>true)) !!}

						<div class="form-group">
							{{Form::label('title', 'Cím: ')}}
							{{Form::text('title', null, array('class'=>'form-control', 'required'=>'', 'maxlength'=>'255'))}}
						</div>

						<div class="form-group">
							{{Form::label('slug','URL')}}
							{{Form::text('slug',null,array('class'=>'form-control', 'required'=>'', 'minlength'=>'5','maxlength'=>'255'))}}
						</div>
						
						<div class="form-group">
						{{ Form::label('tags', 'Tagek:') }}
						<select class="select-multi form-control" name="tags[]" multiple="multiple">
							@foreach($tags as $tag)
								<option value='{{ $tag->id }}'>{{ $tag->name }}</option>
							@endforeach
						</select>
						</div>

						<div class="form-group">
							{{ Form::label('featured_image', 'Kiemelt kép:')}}
							{{ Form::file('featured_image')}}
						</div>

						<div class="form-group">
							{{Form::label('body','Tartalom: ')}}
							{{Form::textarea('body',null,array('class'=>'form-control','required'=>''))}}
						</div>

						{{Form::submit('Mentés', array('class'=>'btn btn-success btn-lg btn'))}}

					{!! Form::close() !!}
				</div>
				</div>
				
            </div> 
		  </div>
	</div>
@endsection

@section('scripts')

{!!Html::script('js/parsley.min.js')!!}
{!!Html::script('js/select2.min.js')!!}

<script type="text/javascript">
    $('.select-multi').select2();
</script>


@endsection
