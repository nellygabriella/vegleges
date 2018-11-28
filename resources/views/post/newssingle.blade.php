@extends('main')

<?php $titleTag = htmlspecialchars($news->title); ?>
@section('title', "| $titleTag" )

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
			<img src="{{asset('images/'.$news->image)}}" height="400" width="800"/>
            <h1>{{ $news->title}}</h1>
            <p>{{$news->body}}</p>
        </div>
    </div>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@foreach($news->comments as $comment)
				<div class="comment">
					<p><strong>Comment:</strong><br/>{{$comment->comment}}<p><br>
				</div>
			@endforeach
		</div>
	</div>

    <div class="row">
		 <div id="comment-form" class="col-md-8 col-md-offset-2">
		 {{ Form::open(['route' => ['comments.store', $news->id], 'method' => 'POST']) }}
		 	<div class="row">

				<div class="col-md-12">
					{{ Form::label('comment', "Comment:") }}
					{{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}

					{{ Form::submit('Add Comment', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top:15px;']) }}
				</div>

			</div>
		 {{ Form::close() }}
		 </div>
	</div>
		
</div>

@endsection