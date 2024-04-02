@extends('layout.app')

@section('title', 'Candidatos')

@section('content')
    <h3>Lista de Candidatos</h3>
    <hr>
    <table class="striped">
        <thead>
            <tr>
                <td>#</td>
                <th>Nome</th>
                <th>CPF</th>
                <th>Logradouro</th>
                <th>Criado em</th>
                <th>Atualizado em</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($candidatos as $candidato)
                <tr>
                    <td>
                        <a class="btn-floating btn-small waves-effect waves-light blue"><i class="material-icons">edit</i></a>
                        <a class="btn-floating btn-small waves-effect waves-light red"><i
                                class="material-icons">delete</i></a>
                    </td>
                    <td>{{ $candidato->nome }}</td>
                    <td>{{ $candidato->cpf }}</td>
                    <td>{{ $candidato->logradouro }}</td>
                    <td>{{ $candidato->created_at->diffForHumans() }}</td>
                    <td>{{ $candidato->updated_at->diffForHumans() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row center">
        {{ $candidatos->links('partials.pagination') }}
    </div>
@endsection
