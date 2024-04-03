@extends('layout.app')

@section('title', 'Novo')

@section('content')
    @if (session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                M.toast({
                    html: "{{ session('error') }}",
                    classes: 'rounded red'
                });
            });
        </script>
    @endif

    <h3>Novo Candidato</h3>
    <hr><br>
    <form action="{{ route('candidatos.store') }}" method="POST" class="col s12">
        @csrf
        <div class="row">
            <div class="input-field col s6">
                <input name="nome" type="text" value="{{ old('nome') }}">
                <label for="nome">Nome</label>
            </div>
            <div class="input-field col s6">
                <input name="cpf" type="number" value="{{ old('cpf') }}">
                <label for="cpf">CPF</label>
            </div>
            <div class="input-field col s12">
                <input name="logradouro" type="text" value="{{ old('logradouro') }}">
                <label for="logradouro">Logradouro</label>
            </div>
        </div>
        <div class="row right">
            <a class="btn-large waves-effect waves-light red" href="{{ route('candidatos') }}">Voltar
                <i class="material-icons left">arrow_back</i>
            </a>
            <button class="btn-large waves-effect waves-light green" type="submit">Salvar
                <i class="material-icons right">send</i>
            </button>
        </div>
    </form>
@endsection
