@extends('layout.layout')

@section('titulo', 'Home')

@section('conteudo')

<div class="row mt-3">
    <div class="col-md-2">
        <a href="{{ route('contato.index') }}" class="btn btn-outline-primary">
            <div class="text-default text-center"><font size=6>Contato</font></div>
        </a>
    </div>
    <div class="col-md-3">
        <a href="{{ route('contato.index_beta') }}" class="btn btn-outline-secondary">
            <div class="text-default text-center"><font size=6>Contato-Beta</font></div>
        </a>
    </div>
    <div class="col-md-3">
        <a href="{{ route('contato.index_code') }}" class="btn btn-outline-primary">
            <div class="text-default text-center"><font size=6>Contato-Code</font></div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="{{ route('grupo_contato.index') }}" class="btn btn-outline-secondary">
            <div class="text-default text-center"><font size=6>Grupo de Contatos</font></div>
        </a>
    </div>
</div>

@endsection