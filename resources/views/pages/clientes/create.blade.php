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

    <h3>Novo Cliente</h3>
    <hr><br>
    <form action="{{ route('clientes.store') }}" method="POST" class="col s12">
        @csrf
        <div class="row">
            <div class="input-field col s6">
                <input name="razaoSocial" type="text" value="{{ old('razaoSocial') }}">
                <label for="razaoSocial">Razão Social</label>
            </div>
            <div class="input-field col s6">
                <input name="cnpj" type="number" value="{{ old('cnpj') }}">
                <label for="cnpj">CNPJ</label>
                <span class="helper-text" data-error="wrong" data-success="right">Digite somente números</span>
            </div>
        </div>
        <div class="row right">
            <a class="btn-large waves-effect waves-light red" href="{{ route('clientes') }}">Voltar
                <i class="material-icons left">arrow_back</i>
            </a>
            <button class="btn-large waves-effect waves-light green" type="submit">Salvar
                <i class="material-icons right">send</i>
            </button>
        </div>
    </form>
@endsection
