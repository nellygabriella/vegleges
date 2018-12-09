@extends('layouts.app')

@section('title', '| Biztosan törli?')

@section('content')

	@if (Session::has('success'))
		
	<div class="alert alert-success" role="alert">
		{{ Session::get('success') }}
	</div>

	@endif

	@if (count($errors) > 0)

	<div class="alert alert-danger" role="alert">
		<strong>Hiba:</strong>
		<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach  
		</ul>
	</div>

	@endif
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="card">
				<div class="card-body">
					<h1>Biztosan törli a hozzászólást?</h1>
					<p>
						<strong>Komment:</strong> {!! $comment->comment !!}
					</p>

					{{ Form::open(['route' => ['comment.destroy', $comment->id], 'method' => 'DELETE']) }}
						
						{{ Form::submit('Igen, törlöm a kommentet', ['class' => 'btn btn-fw btn-block btn-danger']) }}
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>

@endsection