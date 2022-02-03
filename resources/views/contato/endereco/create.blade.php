@extends('layout.layout')

@section('titulo', 'Criar endereço')

@section('breadcrumb')
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb bg-light fs-6 ms-3">
      <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('contato.index') }}">Contatos</a></li>
      <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('contato.show', $contato) }}">{{ $contato->nome }}</a></li>
      <li class="breadcrumb-item active" aria-current="page">Criar endereço</li>
    </ol>
  </nav>
@endsection

@section('conteudo')

<p>
  <h4>Criar endereço</h4>
</p>

<form action="{{ route('contato.endereco.store', [$contato, $endereco]) }}" method="post">
    @csrf

    {{-- Endereço --}}
    <div class="card-body mb-3">
        <h5 class="card-title">Endereço</h5>
        <div class="card-body mb-1 border rounded">
            <x-input name="pais_endereco" id="pais_endereco" :value="old('pais_endereco', $endereco->pais)" span="País" erro="Escreve direito o País DIAXO!!!"/>
            <x-input name="estado_endereco" id="estado_endereco" :value="old('estado_endereco', $endereco->estado)" span="Estado" />
            <x-input name="cidade_endereco" id="cidade_endereco" :value="old('cidade_endereco', $endereco->cidade)" span="Cidade" />
            <x-input name="bairro_endereco" id="bairro_endereco" :value="old('bairro_endereco', $endereco->bairro)" span="Bairro" />
            <x-input name="logradouro_endereco" id="logradouro_endereco" :value="old('logradouro_endereco', $endereco->logradouro)" span="Logradouro" />
            <x-input name="numero_endereco" id="numero_endereco" :value="old('numero_endereco', $endereco->numero)" span="Número" />
            <x-input name="cep_endereco" id="cep_endereco" :value="old('cep_endereco', $endereco->cep)" span="CEP" />
            <x-input name="descricao_endereco" id="descricao_endereco" :value="old('descricao_endereco', $endereco->descricao)" span="Descrição do endereço" />
        </div>
    </div>
    
    <button class="btn btn-primary">Criar</button>
</form>

@endsection