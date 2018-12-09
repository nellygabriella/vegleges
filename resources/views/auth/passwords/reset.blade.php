@extends('layouts.app')

@section('content')
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper">
      <div class="row">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth register-full-bg">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <h2>{{ __('Jelszó visszaállítás') }}</h2>
                
                  <form class="pt-4" method="POST" action="{{ route('password.update') }}">
					@csrf
                    
					<input type="hidden" name="token" value="{{ $token }}">
					
					<div class="form-group">
                      <label for="email">{{ __('E-Mail') }}</label>
                      <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" id="email" aria-describedby="emailHelp" placeholder="E-Mail" required autofocus>
					  @if ($errors->has('email'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
					  @endif
                      <i class="mdi mdi-account"></i>
                    </div>
					
                    <div class="form-group">
                      <label for="password">Jelszó</label>
                      <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password" placeholder="Jelszó" required>
					  @if ($errors->has('password'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
					  @endif
                      <i class="mdi mdi-eye"></i>
                    </div>
					
                    <div class="form-group">
                      <label for="password-confirm">{{ __('Jelszó megerősítés') }}</label>
                      <input type="password" class="form-control" name="password_confirmation" id="password-confirm" placeholder="Jelszó" required>
                      <i class="mdi mdi-eye"></i>
                    </div>
					
                    <div class="mt-5">
                      <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium">
						{{ __('Visszaállítás') }}
					  </button>
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
