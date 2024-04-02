@extends('layout.app')

@section('title', 'Seleção')

@section('content')
    <h3>Lista de Seleção</h3>
    <hr>
    <table class="striped">
        <thead>
            <tr>
                <td>#</td>
                <th>Nome</th>
                <th>Cliente</th>
                <th>Candidato</th>
                <th>Criado em</th>
                <th>Atualizado em</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($selecoes as $selecao)
                <tr>
                    <td></td>
                    <td>{{$selecao->nome}}</td>
                    <td>{{$selecao->cliente->razaoSocial}}</td>
                    <td>{{$selecao->candidato->nome}}</td>
                    <td>{{$selecao->created_at->diffForHumans()}}</td>
                    <td>{{$selecao->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row center">
        {{$selecoes->links('partials.pagination')}}
    </div>
@endsection
