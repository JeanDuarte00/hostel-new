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
                <td>
                    <a href="/dashboard/quartos/deletar/{{$quarto['id']}}" class="btn btn-danger">Deletar</a>
                    <a href="/dashboard/quartos/editar/{{$quarto['id']}}" class="btn btn-info">Editar</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <a href="/dashboard/quartos/salvar" class="btn btn-info">Salvar</a>

    </div>

@endsection