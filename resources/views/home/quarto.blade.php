@extends('layouts.home-layout')

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

            @foreach($imagens as $img)
            <div class="row">
                <div class="card">
                    <img src="http://localhost:8000/storage/{{$img->imagem}}" alt="100%x280" style="height: 280px; width: 100%; display: block;" data-holder-rendered="true">
                </div>
            </div>
            @endforeach
        </div>
    </div>

<<<<<<< HEAD
    <input type="text" name="daterange" class="form-control daterange" value="" />
    <i class="fa fa-calendar"></i>

    <input type="text" name="daterange2" class="form-control daterange" value="" />
    <i class="fa fa-calendar"></i>
=======
    <form action="/home/quarto/salvar" method="post">
        {{ csrf_field() }}
        <input type="text" name="data_inicio" value="" />
        <input type="text" name="data_fim" value="" />
        <input type="hidden" name="quarto_id" value="{{$quarto->id}}">

        <br>
        <br>
        <br>
        <br>
        <br>

        <button class="btn btn-success" type="submit">Reservar</button>
    <form>
>>>>>>> 28b18a4747809f28ee5abb3b8523ca99ee537708

@endsection