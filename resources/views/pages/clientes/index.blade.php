@extends('layout.app')

@section('title', 'Clientes')

@section('content')
    <h3>Lista de Clientes</h3>
    <hr>
    <table class="striped">
        <thead>
            <tr>
                <td>#</td>
                <th>Razão Social</th>
                <th>CNPJ</th>
                <th>Criado em</th>
                <th>Atualizado em</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td></td>
                    <td>{{$cliente->razaoSocial}}</td>
                    <td>{{$cliente->cnpj}}</td>
                    <td>{{$cliente->created_at->diffForHumans()}}</td>
                    <td>{{$cliente->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row center">
        {{$clientes->links('partials.pagination')}}
    </div>
@endsection
