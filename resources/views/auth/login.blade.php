@extends('layouts.app')

@section('content')
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper">
      <div class="row">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-full-bg">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-dark text-left p-5">
                <h2>{{ __('Bejelentkezés') }}</h2>

                
                  <form method="POST" action="{{ route('login') }}" class="pt-5">
					@csrf
                    <div class="form-group">
                      <label for="email">{{ __('E-Mail Cím') }}</label>
                      <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="email" value="{{ old('email') }}" aria-describedby="emailHelp" placeholder="Email" required autofocus>
					    @if ($errors->has('email'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
						@endif
                      <i class="mdi mdi-account"></i>
                    </div>
                    <div class="form-group">
                      <label for="password">{{ __('Jelszó') }}</label>
                      <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" placeholder="Jelszó" required>
						@if ($errors->has('password'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
						@endif
                      <i class="mdi mdi-eye"></i>
                    </div>
					<div class="form-group">
						<div class="col-md-6 offset-md-4">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

								<label class="form-check-label" for="remember">
									{{ __('Jegyezzen meg') }}
								</label>
							</div>
						</div>
					</div>
                    <div class="mt-5">
                      <button type="submit" class="btn btn-block btn-warning btn-lg font-weight-medium">
                                    {{ __('Bejelentkezés') }}
                      </button>
                    </div>
                    <div class="mt-3 text-center">
                      @if (Route::has('password.request'))
						<a class="auth-link text-white" href="{{ route('password.request') }}">
							{{ __('Elfelejtetted az email címed?') }}
						</a>
					  @endif
                    </div>
                  </form>                  
                
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- row ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
@endsection
