@extends('main')

@section('title','|Hírek/Események')
@section('stylesheets')
    {!!Html::style('css/layouts/notes.css')!!}
    {!!Html::style('css/layouts/post_index_responsive.css')!!}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	
@endsection

@section('content')

    @section('hometitle','Jegyzetek')

    <div class="popular page_section">
		<div class="container">
			

			<div class="row course_boxes">
				
                <!-- Popular Course Item -->
                @foreach ($notes as $note)
				<div class="col-lg-4 course_box">
					<div class="card">
						
						<div class="card-body text-center">
							<div class="card-title"><a href="{{ route('post.notessingle', $note->slug) }}">{{$note->title}}</a></div>
                            <div class="card-text">{{ substr(strip_tags($note->body), 0, 80) }}{{ strlen(strip_tags($note->body)) > 80 ? '...' : "" }}</div>
                            <div class="course_author_name">{{$note->user->name}}</span></div>
                        </div>
						
							<div class="button button_color_1 text-center trans_200"><a href="{!! route('getfile',$note->filename)!!}" target="_blank"><i class="fas fa-download"></i>Letöltés</a></div>
						
					</div>
				</div>
                @endforeach

			</div>
		</div>		
	</div>

@endsection