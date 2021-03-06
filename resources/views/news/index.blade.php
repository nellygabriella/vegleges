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
					
					  @foreach($news as $n)
                      <tr>
                          <td>{{ $n->id }}</td>
                          <td>{{ $n->title }}</td>
                          <td>{{ substr(strip_tags($n->body), 0, 50) }}{{ strlen(strip_tags($n->body)) > 50 ? "..." : "" }}</td>
                          <td>{{ date('Y, M j', strtotime($n->created_at)) }}</td>
                          <td>{{ date('Y, M j', strtotime($n->updated_at)) }}</td>
                          <td>
                            <a href="{{ route('news.show', $n->id) }}" class="btn btn-primary">Nézet</a>
                          </td>
                          <td>
                            <a href="{{ route('news.edit', $n->id) }}" class="btn btn-warning">Módosít</a>
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
              
              <li class="page-item"><a class="page-link" href="#"><i class="mdi mdi-chevron-right"></i></a></li>
          </ul>
        </nav>
		  </div>
  </div>

@endsection