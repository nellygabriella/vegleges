@extends('layouts.app')

@section('content')

  @include('partials._dashboard')
  
  <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Állások</h4>
              <div class="row">
                <div class="col-12">
                  <table id="order-listing" class="table" cellspacing="0">
                    <thead>
                      <tr>
                          <th>#</th>
                          <th>Cím</th>
                          <th>Leírás</th>
                          <th>Készült</th>
                          <th>Módosítva</th>
                          <th></th>
                          <th></th>
                      </tr>
                    </thead>
                    <tbody>
					
					  @foreach($notes as $note)
                      <tr>
                          <td>{{ $note->id }}</td>
                          <td>{{ $note->position }}</td>
                          <td>{{ substr(strip_tags($note->body), 0, 50) }}{{ strlen(strip_tags($note->body)) > 50 ? "..." : "" }}</td>
                          <td>{{ date('Y, M j', strtotime($note->created_at)) }}</td>
                          <td>{{ date('Y, M j', strtotime($note->updated_at)) }}</td>
                          <td>
                            <a href="{{ route('notes.show', $note->id) }}" class="btn btn-primary">Nézet</a>
                          </td>
                          <td>
                            <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-warning">Módosít</a>
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
              {!! $notes->links(); !!}
              <li class="page-item"><a class="page-link" href="#"><i class="mdi mdi-chevron-right"></i></a></li>
          </ul>
        </nav>
		  </div>
  </div>

@endsection