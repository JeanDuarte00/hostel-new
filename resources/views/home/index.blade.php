@extends('cliente.layout')

@section('content')

   <section class="jumbotron text-center">
      <div class="container">
        <h1 class="jumbotron-heading">Hostel Recife</h1>
        <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
        <p>
          <a href="#" class="btn btn-primary">Ver todos os quartos</a>
        </p>
      </div>
    </section>

    <div class="album text-muted">
      
    <h3>Alguns quarto</h3>
        <div class="container">

            @foreach($quartos as $quarto)
            <a href="/home/quarto/{{$quarto->id}}"><div class="row">
                <div class="card">
                    
                    <img src="http://localhost:8000/storage/{{$quarto->imagens()->first()->imagem}}" alt="100%x280" style="height: 280px; width: 100%; display: block;" data-holder-rendered="true">
                    <p class="card-text">{{$quarto->nome}}</p>
                </div>
            </div></a>
            @endforeach
        </div>
    </div>

@endsection