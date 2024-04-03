@extends('layout.app')

@section('title', 'Seleção')

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

    <h3>Lista de Seleção</h3>
    <hr>
    <table class="striped">
        <div class="row">
            <div class="col s6">
                <a href="{{ route('selecao.create') }}" class="btn waves-effect waves-light">
                    Novo<i class="material-icons right">add</i>
                </a>
            </div>
        </div>
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
                    <td>
                        <form action="{{ route('selecao.delete', $selecao->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <a class="btn-floating btn-small waves-effect waves-light blue"
                                href="{{ route('selecao.edit', $selecao->id) }}"><i class="material-icons">edit</i>
                            </a>
                            <button class="btn-floating btn-small waves-effect waves-light red">
                                <i class="material-icons">delete</i>
                            </button>
                        </form>
                    </td>
                    <td>{{ $selecao->nome }}</td>
                    <td>{{ $selecao->cliente->razaoSocial }}</td>
                    <td>{{ $selecao->candidato->nome }}</td>
                    <td>{{ $selecao->created_at->diffForHumans() }}</td>
                    <td>{{ $selecao->updated_at->diffForHumans() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row center">
        {{ $selecoes->links('partials.pagination') }}
    </div>
@endsection
