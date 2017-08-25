@extends('cliente.layout')

@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-success">
        <div class="panel-heading">Registrar Cliente</div>
        <div class="panel-body">
          <form class="form-horizontal" role="form" method="POST" action="{{ url('/cliente/registrar') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <label for="name" class="col-md-4 control-label">Nome</label>

              <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required
                       autofocus>

                @if ($errors->has('name'))
                  <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="email" class="col-md-4 control-label">E-Mail</label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                  <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('data_nascimento') ? ' has-error' : '' }}">
              <label for="dataNascimento" class="col-md-4 control-label">Data Nascimento</label>

              <div class="col-md-6">
                <input id="dataNascimento" type="date" class="form-control" name="data_nascimento"
                       value="{{ old('data_nascimento') }}" required>

                @if ($errors->has('data_nascimento'))
                  <span class="help-block">
                                        <strong>{{ $errors->first('data_nascimento') }}</strong>
                                    </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="password" class="col-md-4 control-label">Senha</label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                  <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
              </div>
            </div>

            <div class="form-group">
              <label for="password-confirm" class="col-md-4 control-label">Confirmar Senha</label>

              <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                       required>
              </div>
            </div>
            <div class="form-group">
              <label for="cep" class="col-md-4 control-label">CEP</label>
              <div class="col-md-6">
                <input id="cep" type="text" class="form-control" name="cep" required>
              </div>
            </div>
            <div class="form-group">
              <label for="endereco" class="col-md-4 control-label">Endereço</label>
              <div class="col-md-6">
                <input id="endereco" type="text" class="form-control" name="endereco" required>
              </div>
            </div>
            <div class="form-group">
              <label for="numero" class="col-md-4 control-label">Número</label>
              <div class="col-md-6">
                <input id="numero" type="text" class="form-control" name="numero" required>
              </div>
            </div>
            <div class="form-group">
              <label for="complemento" class="col-md-4 control-label">Complemento</label>
              <div class="col-md-6">
                <input id="complemento" type="text" class="form-control" name="complemento" required>
              </div>
            </div>
            <div class="form-group">
              <label for="bairro" class="col-md-4 control-label">Bairro</label>
              <div class="col-md-6">
                <input id="bairro" type="text" class="form-control" name="bairro" required>
              </div>
            </div>
            <div class="form-group">
              <label for="cidade" class="col-md-4 control-label">Cidade</label>
              <div class="col-md-6">
                <input id="cidade" type="text" class="form-control" name="cidade" required>
              </div>
            </div>
            <div class="form-group">
              <label for="estado" class="col-md-4 control-label">Estado</label>
              <div class="col-md-6">
                <input id="estado" type="text" class="form-control" name="estado" required>
              </div>
            </div>
            <div class="form-group">
              <label for="valor" class="col-md-4 control-label">Valor</label>
              <div class="col-md-6">
                <input id="valor" type="text" class="form-control maskMoeda" name="valor" required>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-success">Registrar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection