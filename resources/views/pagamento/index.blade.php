@extends('cliente.layout')

@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <form class="form-horizontal" role="form" method="POST" action="{{ url('/cliente/login') }}">
        {{ csrf_field() }}
         
        <div class="form-group{{ $errors->has('numero_cartao') ? ' has-error' : '' }}">
              <label for="numero-cartao" class="col-md-4 control-label">Número Cartão</label>
              <div class="col-md-6">
                <input id="numero-cartao" type="text" class="form-control" name="numeroCartao" value="{{ old('numeroCartao') }}" required
                        >
                @if ($errors->has('email'))
                  <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif
              </div>
              <div class="col-md-6">
                 <label id="bandeira"></label>
              </div>
        </div>

         <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="Nome" class="col-md-4 control-label">Name</label>
            <div class="col-md-6">
              <input id="nome" type="text" class="form-control" name="name" value="{{ old('name') }}" required
                      >
              @if ($errors->has('name'))
                <span class="help-block">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
              @endif
            </div>
          </div>

          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="email" class="col-md-4 control-label">E-mail</label>
              <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required
                        >
                @if ($errors->has('email'))
                  <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif
              </div>
          </div>

          <div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }}">
              <label for="cpf" class="col-md-4 control-label">CPF</label>
              <div class="col-md-6">
                <input id="cpf" type="text" class="form-control" name="cpf" value="{{ old('cpf') }}" required
                        >
                @if ($errors->has('cpf'))
                  <span class="help-block">
                    <strong>{{ $errors->first('cpf') }}</strong>
                  </span>
                @endif
              </div>
          </div>

          <div class="form-group{{ $errors->has('telefone') ? ' has-error' : '' }}">
              <label for="telefone" class="col-md-4 control-label">Telefone</label>
              <div class="col-md-6">
                <input id="telefone" type="text" class="form-control" name="telefone" value="{{ old('telefone') }}" required
                        >
                @if ($errors->has('telefone'))
                  <span class="help-block">
                    <strong>{{ $errors->first('telefone') }}</strong>
                  </span>
                @endif
              </div>
          </div>

          <div class="form-group{{ $errors->has('endereco') ? ' has-error' : '' }}">
              <label for="endereco" class="col-md-4 control-label">Endereço</label>
              <div class="col-md-6">
                <input id="endereco" type="text" class="form-control" name="endereco" value="{{ old('endereco') }}" required
                        >
                @if ($errors->has('email'))
                  <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif
              </div>
          </div>

          <div class="form-group{{ $errors->has('valor') ? ' has-error' : '' }}">
              <label for="valor" class="col-md-4 control-label">Valor</label>
              <div class="col-md-6">
                <input id="valor" type="number" class="form-control" name="valor" value="{{ old('valor') }}" required
                        >
                @if ($errors->has('valor'))
                  <span class="help-block">
                    <strong>{{ $errors->first('valor') }}</strong>
                  </span>
                @endif
              </div>
          </div>

          <div class="form-group{{ $errors->has('valor') ? ' has-error' : '' }}">
            <select id="parcelas">

            </select>
          </div>

          
        
      </form>
      <button onclick="getMeioPagamento()" class="btn btn-info">Obter id comprador</button>
    </div>
  </div>

    <script type="text/javascript" src=
        "https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js">
    </script>
    <script type="text/javascript">
        PagSeguroDirectPayment.setSessionId('{{$token}}');

      $(document).ready(function(){
        $("#numero-cartao").blur(function(){
          getBandeiraCartao($("#numero-cartao").val(), function(response){
            $("#bandeira").text(response.brand.name);
          });
          
        });

        $("#valor").blur(function(){
          let bandeira = $("#bandeira").text();
          getParcelaPorCartao($("#valor").val(), bandeira, function(response){
            $.each(response.installments.mastercard, function(key, value) {
              $('#parcelas')
                .append($("<option></option>")
                .attr("value", value.quantity)
                .text(value.quantity + " x R$" + value.installmentAmount));
            });
          });
        })
      });
    </script>
    

@endsection