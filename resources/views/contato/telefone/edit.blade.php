@extends('layout.layout')

@section('titulo', 'Editar contato')

@section('breadcrumb')
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb bg-light fs-6 ms-3">
      <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('contato.index') }}">Contatos</a></li>
      <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('contato.show', $contato) }}">{{$contato->nome}}</a></li>
      <li class="breadcrumb-item active" aria-current="page">Editar contato</li>
    </ol>
  </nav>
@endsection

@section('conteudo')

<form action="{{ route('contato.telefone.update', [$contato, $telefone]) }}" method="post">
    @csrf
    @method("PATCH")

    {{-- Telefones --}}
    <div class="card-body mb-3">
        <h5 class="card-title">Telefone</h5>
        <div class="card-body mb-1 border rounded">
            <x-input name="telefone" id="telefone" :value="old('telefone', $telefone->numero)" span="Telefone" />
            <x-input name="descricao_telefone" id="descricao_telefone" :value="old('descricao_telefone', $telefone->descricao)" span="Descrição do telefone" />
        </div>
    </div>
    
    <button class="btn btn-primary">Salvar</button>
</form>

@endsection