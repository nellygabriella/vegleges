@extends('main')

@section('title', '| Biztosan törli?')

@section('content')
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Biztosan törli a hozzászólást?</h1>
			<p>
				<strong>Komment:</strong> {{ $comment->comment }}
			</p>

			{{ Form::open(['route' => ['comment.destroy', $comment->id], 'method' => 'DELETE']) }}
				
				{{ Form::submit('Igen, törlöm a kommentet', ['class' => 'btn btn-lg btn-block btn-danger']) }}
			{{ Form::close() }}
		</div>
	</div>

@endsection