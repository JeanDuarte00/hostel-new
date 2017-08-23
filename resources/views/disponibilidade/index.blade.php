@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Quartos</h1>

    <table class="table table-striped table-bordered">
        
        <thead>
            <tr>
                <th>Nome</th>
                <th>Valor</th>
                <th>Descrição Simples</th>
                <th>Ações</th>
            <tr>
        </thead>

        <tbody>
        @foreach($quartos as $quarto)
            <tr>
                <td>{{$quarto['nome']}}</td>
                <td>{{$quarto['valor']}}</td>
                <td>{{$quarto['descricao_simples']}}</td>
                <td><a class="btn btn-success" href="/disponibilidade/add/{{$quarto['id']}}">Adicionar período</a>
                    <a class="btn btn-info" href="/disponibilidade/view/{{$quarto['id']}}">Visualizar</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

    </div>

@endsection