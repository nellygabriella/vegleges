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

@section('content')

	@include('partials._dashboard')
	
	<div class="content-wrapper">
          <div class="row">
			<div class="col-md-10 grid-margin stretch-card">
				<div class="card">
                <div class="card-body">
                  <h4 class="card-title">Új jegyzet fetöltése</h4>
				  
					{!! Form::open(array('route' => 'notes.store','data-parsley-validate' => '', 'files'=>true)) !!}

						<div class="form-group">
							{{Form::label('title', 'Cím: ')}}
							{{Form::text('title', null, array('class'=>'form-control', 'required'=>'', 'maxlength'=>'255'))}}
						</div>
                        
                        <div class="form-group">
                            {{Form::label('slug','URL')}}
                            {{Form::text('slug',null,array('class'=>'form-control', 'required'=>'', 'minlength'=>'5','maxlength'=>'255'))}}
                        </div>

                        <div class="form-group">
                            {{ Form::label('filefield', 'Dokumentum:')}}
                            {{ Form::file('filefield')}}
                        </div>

						<div class="form-group">
							{{Form::label('body','Leírás: ')}}
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

<script>
$("#title").keyup(function(){
	var str = $(this).val();
	var trims = $.trim(str);
	var slug = trims.replace(/[^a-z0-9]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '')
	$("#slug").val(slug.toLowerCase())
})
</script>

@endsection