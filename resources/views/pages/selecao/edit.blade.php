@extends('layout.app')

@section('title', $selecao->nome)

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

    <h3>Editar Seleção</h3>
    <hr><br>
    <form action="{{ route('selecao.update',$selecao->id) }}" method="POST" class="col s12">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="input-field col s12">
                <input name="nome" type="text" value="{{ $selecao->nome }}">
                <label for="nome">Nome</label>
            </div>
            <div class="col s6">
                <label>Cliente</label>
                <select name="cliente">
                    <option value="" disabled selected>Selecione...</option>
                    @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->id }}"  {{ ($selecao->fk_clienteId == $cliente->id ? "selected":"") }}>{{ $cliente->razaoSocial }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col s6">
                <label>Candidatos</label>
                <select name="candidato">
                    <option value="" disabled selected>Selecione...</option>
                    @foreach ($candidatos as $candidato)
                        <option value="{{ $candidato->id }}" {{ ($selecao->fk_candidatoId  == $candidato->id ? "selected":"") }}>{{ $candidato->nome }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row right">
            <a class="btn-large waves-effect waves-light red" href="{{ route('selecao') }}">Voltar
                <i class="material-icons left">arrow_back</i>
            </a>
            <button class="btn-large waves-effect waves-light green" type="submit">Salvar
                <i class="material-icons right">send</i>
            </button>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });
    </script>
@endsection
