@extends('layouts.app')

@section('content')

@if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/quartos/salvar" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="nome">Nome do quarto</label>
            <input type="text" name="nome" class="form-control" id="nome">
        </div>

        <div class="form-group">
            <label for="descricao_simples">Descrição Simples</label>
            <input type="text" name="descricao_simples" class="form-control" id="descricao_simples">
        </div>

        <div class="form-group">
            <label for="descricao_completa">Descrição Completa</label>
            <input type="text" name="descricao_completa" class="form-control" id="descricao_completa">
        </div>

        <div class="form-group">
            <label for="valor">Valor do quarto</label>
            <input type="number" name="valor" class="form-control" id="valor">
        </div>

        <div class="form-group">
            <label for="photos">Upload de arquivos</label>
            <input type="file" name="photos[]" class="form-control" id="photos" multiple>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
</form>


@endsection