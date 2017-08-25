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

    <h3>Alguns quarto</h3>
    <div class="container">
      @foreach($quartos as $quarto)
        <a href="/home/quarto/{{$quarto->id}}">
          <div class="row">
            <div class="card">

              <img src="http://localhost:8000/storage/{{$quarto->imagens()->first()->imagem}}"
                   alt="100%x280" style="height: 280px; width: 100%; display: block;"
                   data-holder-rendered="true">
              <p class="card-text">{{$quarto->nome}}</p>
            </div>
          </div>
        </a>
      @endforeach
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <i class="fa fa-search"></i>&nbsp; <strong>Pesquisar</strong>
            </div>
            <div class="panel-body">
              <form>
                <div class="form-group">
                  <label for="hotel">Destino/Acomodação</label>
                  <input type="text" id="hotel" class="form-control">
                </div>
                <div class="form-group">
                  <label for="dataEntrada">Data de Entrada</label>
                  <div class="input-group date">
                    <input type="text" id="dataEntrada" class="form-control maskData daterange">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i>
                  </div>
                  <div>
                    <div>
                      <div class="form-group">
                        <label for="dataSaida">Data de Saída</label>
                        <div class="input-group date">
                          <input type="text" id="dataSaida"
                                 class="form-control maskData daterange">
                          <span class="input-group-addon"><i class="fa fa-calendar"></i>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="quarto">Quartos</label>
                        <select class="form-control" id="quarto">
                          <option>Quarto 1</option>
                          <option>Quarto 2</option>
                          <option>Quarto 3</option>
                          <option>Quarto 4</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="adultos">Adultos</label>
                        <select class="form-control" id="adultos">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="criancas">Crianças</label>
                        <select class="form-control" id="criancas">
                          <option>Sem Crianças</option>
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                        </select>
                      </div>
                      <button type="button" class="btn btn-primary">Reservar</button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="row">
            <div class="col-xs-6">
              <a href="#" class="thumbnail">
                <img class="thumbnail-img"
                     src="https://images.homify.com/c_fill,f_auto,q_auto:eco,w_440/v1483730042/p/photo/image/1762001/QUARTO_CASAL_post.jpg"
                     alt="Quarto1">
              </a>
            </div>
            <div class="col-xs-6">
              <a href="#" class="thumbnail">
                <img class="thumbnail-img" src="assets/img/Quarto2.jpg" alt="Quarto2">
              </a>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-6">
              <a href="#" class="thumbnail">
                <img class="thumbnail-img" src="assets/img/Quarto3.jpg" alt="Quarto3">
              </a>
            </div>
            <div class="col-xs-6">
              <a href="#" class="thumbnail">
                <img class="thumbnail-img" src="assets/img/Quarto4.jpg" alt="Quarto4">
              </a>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-6">
              <a href="#" class="thumbnail">
                <img class="thumbnail-img" src="assets/img/Quarto5.jpg" alt="Quarto5">
              </a>
            </div>
            <div class="col-xs-6">
              <a href="#" class="thumbnail">
                <img class="thumbnail-img" src="assets/img/Quarto6.jpg" alt="Quarto6">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  </div>

@endsection