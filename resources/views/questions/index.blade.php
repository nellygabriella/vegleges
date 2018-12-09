@extends('layouts.app')

@section('content')

  @include('partials._dashboard')
  
  <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Kérdések</h4>
              <div class="row">
                <div class="col-12">
                  <table id="order-listing" class="table" cellspacing="0">
                    <thead>
                      <tr>
                          <th>#</th>
                          <th>Cím</th>
                          <th>Tartalom</th>
                          <th>Készült</th>
                          <th>Módosítva</th>
                          <th></th>
                          <th></th>
                      </tr>
                    </thead>
                    <tbody>
					
					  @foreach($questions as $question)
                      <tr>
                          <td>{{ $question->id }}</td>
                          <td>{{ $question->question }}</td>
                          <td>{!! substr(strip_tags($question->body), 0, 50) !!}{!! strlen(strip_tags($question->body)) > 50 ? "..." : "" !!}</td>
                          <td>{{ date('Y, M j', strtotime($question->created_at)) }}</td>
                          <td>{{ date('Y, M j', strtotime($question->updated_at)) }}</td>
                          <td>
                            <a href="{{ route('questions.show', $question->id) }}" class="btn btn-primary">Nézet</a>
                          </td>
                          <td>
                            <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-warning">Módosít</a>
                          </td>
                      </tr>
					  @endforeach
                      
					</tbody>
				  </table>
				</div>
        </div>
       
      </div>
       
		  </div>
  </div>

@endsection