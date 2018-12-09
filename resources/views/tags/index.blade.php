@extends('layouts.app')

@section('title', '| All Tags')

@section('content')

@include('partials._dashboard')
<div class="content-wrapper">
		<div class="card">
		  <div class="card-body">
			<h4 class="card-title">Címkék</h4>
			<div class="row">
			  <div class="col-8">
				<table id="order-listing" class="table" cellspacing="0">
				  <thead>
					<tr>
						<th>#</th>
						<th>Név</th>
					</tr>
				  </thead>
				  <tbody>
				  
					@foreach($tags as $tag)
					<tr>
						<td>{{ $tag->id }}</td>
						<td>{{ $tag->name }}</td>
						<td>
							{{ Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE']) }}
								{{ Form::submit('Törlés', ['class' => 'btn btn-danger btn-block', 'style' => 'margin-top:20px;']) }}
							{{ Form::close() }}
						</td>
					</tr>
					@endforeach
					
				  </tbody>
				</table>
			  </div>
			  <div class="col-md-3">
					<div class="well">
						{!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}
							<h2>Új címke</h2>
							{{ Form::label('name', 'Név:') }}
							{{ Form::text('name', null, ['class' => 'form-control']) }}
		
							{{ Form::submit('Mentés', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}
						
						{!! Form::close() !!}
					</div>
				</div>
	  </div>

@endsection