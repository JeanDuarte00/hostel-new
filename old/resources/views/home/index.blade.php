@extends('cliente.layout')

@section('content')

  <section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">Hostel Recife</h1>
      <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator,
        etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
      <p>
        <a href="#" class="btn btn-primary">Ver todos os quartos</a>
      </p>
    </div>
  </section>

  <div class="album text-muted">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <i class="fa fa-search"></i>&nbsp; <strong>Pesquisar</strong>
            </div>
            <div class="panel-body">
              <form action="/pesquisar" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="dataEntrada">Data de Entrada</label>
                  <div class="input-group date">
                    <input type="text" id="data_inicio" name="data_inicio" class="form-control maskData daterange">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i>
                  </div>
                </div>
                <div class="form-group">
                  <label for="dataSaida">Data de Saída</label>
                  <div class="input-group date">
                    <input type="text" id="dataSaida"
                           class="form-control maskData daterange" name="data_saida">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i>
                  </div>
                </div>
                <div class="form-group">
                  <label for="adultos">Adultos</label>
                  <select class="form-control" id="adultos" name="qtd_adultos">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="adultos">Crianças</label>
                  <select class="form-control" id="adultos" name="qtd_criancas">
                    <option>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary">Reservar</button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="row">
          @foreach($quartos as $quarto)
          <div class="col-xs-6">
              <a href="/home/quarto/{{$quarto->id}}" class="thumbnail">
                <img src="{{ env('APP_URL') }}/storage/{{$quarto->imagens()->first()->imagem}}" 
                     class="thumbnail-img"
                     alt="teste" data-holder-rendered="true">
              </a>
            </div>
          @endforeach
         </div>
        </div>
      </div>
    </div>
  </div>

  </div>

@endsection