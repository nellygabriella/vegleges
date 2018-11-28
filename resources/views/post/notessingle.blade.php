@extends('main')



@section('stylesheets')
{!!Html::style('css/layouts/post_single.css')!!}
@endsection

@section('content')




<div class="col-md-2">
    <div class="thumbnail">
        
        <div class="caption">
            <p>{{$note->original_filename}}</p>
        </div>
    </div>
</div>

      

@endsection

