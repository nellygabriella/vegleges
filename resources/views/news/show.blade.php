@extends('main')


@section('stylesheets')
    {!!Html::style('css/select2.min.css')!!}
@endsection

@section('content')

    <div class="row">
        <div class="col-md-8">

            <img src="{{asset('images/'.$news->image)}}" alt="Akép nem jeleníthető meg"/>
            <h1>{{ $news->title }}</h1>
            <p class="lead">{!!$news->body!!}</p>
            <hr>
            <div class="tags">
				@foreach ($news->tags as $tag)
					<span class="label label-default">{{ $tag->name }}</span>
				@endforeach
            </div>
        </div>
        <div id="backend-comments" style="margin-top: 50px;">
				<h3>Comments <small>{{ $news->comments()->count() }} total</small></h3>

				<table class="table">
					<thead>
							<th>Comment</th>
					</thead>

					<tbody>
						@foreach ($news->comments as $comment)
						<tr>
							<td>{{ $comment->comment }}</td>
							<td>
								<a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
        </div>
        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>URL: </dt>
                    <dd><a href="{{url('post/'.$news->slug)}}">{{url($news->slug) }}</a></dd>
                </dl>
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
                        {!!Html::linkRoute('news.edit', 'Szerkeszt', array($news->id),array('class'=>'btn btn-primary btn-block'))!!}
                    </div>
                    <div class="col-sm-6">

                        {!! Form::open(['route'=>['news.destroy',$news->id],'method' => 'DELETE']) !!}

                        {!! Form::submit('Törlés',['class'=>'btn btn-danger btn-block']) !!}

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection