@extends('layouts.app')

@section('content')

    @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/dashboard/quartos/salvar" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <input type="hidden" name="id" id="id" value="{{$quarto->id}}">

        <div class="form-group">
            <label for="nome">Nome do quarto</label>
            <input type="text" name="nome" class="form-control" id="nome" value="{{$quarto->nome}}">
        </div>

        <div class="form-group">
            <label for="descricao_simples">Descrição Simples</label>
            <input type="text" name="descricao_simples" class="form-control" id="descricao_simples" value="{{$quarto->descricao_simples}}">
        </div>

        <div class="form-group">
            <label for="descricao_completa">Descrição Completa</label>
            <input type="text" name="descricao_completa" class="form-control" id="descricao_completa" value="{{$quarto->descricao_completa}}">
        </div>

        <div class="form-group">
            <label for="qtd_adultos">Quantidade Adultos</label>
            <input type="number" name="qtd_adultos" class="form-control" id="qtd_adultos" value="{{$quarto->qtd_adultos}}">
        </div>

        <div class="form-group">
            <label for="qtd_criancas">Quantidade Crianças</label>
            <input type="number" name="qtd_criancas" class="form-control" id="qtd_criancas" value="{{$quarto->qtd_criancas}}">
        </div>

        <div class="form-group">
            <label for="valor">Valor do quarto</label>
            <input type="number" name="valor" class="form-control" id="valor" value="{{$quarto->valor}}">
        </div>

        <div class="form-group">
            <label for="photos">Upload de arquivos</label>
            <input type="file" name="photos[]" class="form-control" id="photos" multiple>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
</form>


@endsection