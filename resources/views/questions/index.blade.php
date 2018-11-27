@extends('layouts.app')

@section('content')

  @include('partials._dashboard')
  
  <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Hírek</h4>
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
                          <td>{{ $question->title }}</td>
                          <td>{{ substr(strip_tags($question->body), 0, 50) }}{{ strlen(strip_tags($question->body)) > 50 ? "..." : "" }}</td>
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
       <nav>
          <ul class="pagination rounded-flat justify-content-center pagination-secondary">
              <li class="page-item"><a class="page-link" href="#"><i class="mdi mdi-chevron-left"></i></a></li>
              {!! $questions->links(); !!}
              <li class="page-item"><a class="page-link" href="#"><i class="mdi mdi-chevron-right"></i></a></li>
          </ul>
        </nav>
		  </div>
  </div>

@endsection