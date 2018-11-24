@extends('layouts.app')

@section('content')
<div class="row grid-margin">
	<div class="col-lg-12">
	  <div class="card">
		<div class="card-body">
		  <h4 class="card-title">{{ __('Jelszó visszaállítás') }}</h4>
		  
		  @if (session('status'))
			<div class="alert alert-success" role="alert">
				{{ session('status') }}
			</div>
		  @endif
		  
		  <form class="cmxform" id="commentForm" method="POST" action="{{ route('password.email') }}">
		  @csrf
		  
			<fieldset>
				<div class="form-group">
					<label for="email">{{ __('E-Mail') }}</label>
					<input id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"minlength="2" type="text" required>
					@if ($errors->has('email'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
					@endif
				</div>
				<button type="submit" class="btn btn-primary">
					{{ __('Email küldése') }}
				</button>
			</fieldset>
		  </form>
		</div>
	  </div>
	</div>
</div>
@endsection
