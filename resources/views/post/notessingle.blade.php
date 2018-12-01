@extends('main')



@section('stylesheets')
{!!Html::style('css/layouts/post_single.css')!!}
@endsection

@section('content')




<div class="col-md-2">
    <div class="thumbnail">
            
            <div class="button button_color_1 text-center trans_200"><a href="{!! route('getfile',$note->filename)!!}">Új hír</a></div>
        <div class="caption">
            <p>{{$note->original_filename}}</p>
        </div>
    </div>
</div>

      

@endsection

