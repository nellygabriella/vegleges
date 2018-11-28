@extends('main')


@section('title', "| ")

@section('stylesheets')
{!!Html::style('css/layouts/post_single.css')!!}
@endsection

@section('content')



<comment comment-url="{{$question_id}}"></comment>
      

@endsection

