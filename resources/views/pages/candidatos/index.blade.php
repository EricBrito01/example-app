@extends('layout.app')

@section('title', 'Candidatos')

@section('content')
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                M.toast({
                    html: "{{ session('success') }}",
                    classes: 'rounded green'
                });
            });
        </script>
    @endif

    <h3>Lista de Candidatos</h3>
    <hr>
    <table class="striped">
        <div class="row">
            <div class="col s6">
                <a href="{{ route('candidatos.create') }}" class="btn waves-effect waves-light">
                    Novo<i class="material-icons right">add</i>
                </a>
            </div>
        </div>

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
                        <form action="{{ route('candidatos.delete', $candidato->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <a class="btn-floating btn-small waves-effect waves-light blue"
                                href="{{ route('candidatos.edit', $candidato->id) }}"><i class="material-icons">edit</i>
                            </a>
                            <button class="btn-floating btn-small waves-effect waves-light red">
                                <i class="material-icons">delete</i>
                            </button>
                        </form>
                    </td>
                    <td>{{ $candidato->nome }}</td>
                    <td>{{ $candidato->formatCPF() }}</td>
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
