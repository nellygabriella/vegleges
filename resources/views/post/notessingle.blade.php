@extends('main')



@section('stylesheets')
{!!Html::style('css/layouts/post_single.css')!!}
@endsection

@section('content')




  <tr>
       <td>{!! link_to( route('notes.get_file', $note->filename) . '/' . $note->filename, $note->filename) !!} </td>
  </tr>

      

@endsection

