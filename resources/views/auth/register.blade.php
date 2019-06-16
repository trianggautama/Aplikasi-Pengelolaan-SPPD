@extends('layouts.login_register')

@section('content')
<div class="container">
<br><br><br>
  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
        <div class="col-lg-7">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Buat Akun Anda</h1>
            </div>
            <form method="POST" action="{{ route('register') }}">
             @csrf
              <div class="form-group row">
                <div class="col-sm-12 mb-3 mb-sm-0">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}  form-control-user" name="name" value="{{ old('name') }}" placeholder="nama anda" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                </div>
              </div>
              <div class="form-group">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form-control-user" name="email" value="{{ old('email') }}" placeholder="Email Address" required>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} form-control-user" name="password"  placeholder="Password" required>

                  @if ($errors->has('password'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
                </div>
                <div class="col-sm-6">
                  <input id="password-confirm" type="password" class="form-control form-control-user" name="password_confirmation" placeholder="Repeat Password" required>

                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-user">
                Register Account
                </button>

              <hr>
            </form>
            <hr>
            <div class="text-center">
              <a class="small" href="/login">Sudah Punya Akun? Login disini</a>
              <br><br>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

@endsection
