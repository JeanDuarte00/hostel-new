@extends('cliente.layout')

@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <form class="form-horizontal" role="form" method="POST" action="{{ url('/cliente/login') }}">
        {{ csrf_field() }}
        <div class="my-form{{ $errors->has('email') ? ' has-error' : '' }}">
          <img
            src="http://www.minihostels.com/assets/menu/icon-hostel-finder-d9da351fcc9a7b74d47b138bbb48d39885953b47bfcf220292dfb1513ee1b019.svg"
            class="img-responsive center-block" alt="Hostel Recife" height="200px" width="200px">
          <h2 class="text-center">Bem Vindo</h2>
          <div class="form-group">
            <div class="col-md-8 col-md-offset-2">
              <div class="input-group">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required
                       autofocus>
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
              </div>
              @if ($errors->has('email'))
                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
              @endif
            </div>
          </div>
          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <div class="col-md-8 col-md-offset-2">
              <div class="input-group">
                <input id="password" type="password" class="form-control" name="password" required>
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
              </div>
              @if ($errors->has('password'))
                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
              @endif
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-8 col-md-offset-2">
              <button type="submit" class="btn btn-block btn-success">
                <strong>ENTRAR</strong>
              </button>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-4 col-md-offset-2">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Lembrar-me
                </label>
              </div>
            </div>
            <div class="col-md-4 text-right">
              <a class="btn btn-link" href="{{ url('/cliente/reset') }}">
                Esqueceu sua senha?
              </a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection