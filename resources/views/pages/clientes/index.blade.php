@extends('layout.app')

@section('title', 'Clientes')

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

    <h3>Lista de Clientes</h3>
    <hr>
    <table class="striped">
        <div class="row">
            <div class="col s6">
                <a href="{{ route('clientes.create') }}" class="btn waves-effect waves-light">
                    Novo<i class="material-icons right">add</i>
                </a>
            </div>
        </div>

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
                    <td>
                        <form action="{{ route('clientes.delete', $cliente->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <a class="btn-floating btn-small waves-effect waves-light blue"
                                href="{{ route('clientes.edit', $cliente->id) }}"><i class="material-icons">edit</i>
                            </a>
                            <button class="btn-floating btn-small waves-effect waves-light red">
                                <i class="material-icons">delete</i>
                            </button>
                        </form>
                    </td>
                    <td>{{ $cliente->razaoSocial }}</td>
                    <td>{{ $cliente->formatCNPJ() }}</td>
                    <td>{{ $cliente->created_at->diffForHumans() }}</td>
                    <td>{{ $cliente->updated_at->diffForHumans() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row center">
        {{ $clientes->links('partials.pagination') }}
    </div>
@endsection
