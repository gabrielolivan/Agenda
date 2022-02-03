@extends('layout.layout')

@section('titulo', 'Grupo de contato')

@section('conteudo')


<form action="{{ route('grupo_contato.store') }}" method="post">
    @csrf
    <div class="form-group">
        <x-input name="nome" id="nome" :value="old('nome')" span="Nome" required='true'/>
        <x-input name="descricao" id="descricao" :value="old('descricao')" span="Descrição"/>
    </div>

    <div class="input-group mt-3">
        <label class="input-group-text me-1" for="contatos">Contatos</label>
        <select required="true" class="selectpicker form-control" name="contatos[]" id="contatos" multiple data-actions-box="true" data-size="5" data-live-search="true" title="selecione os contatos">
            
            @foreach($contatos as $contato)
            <option value="{{$contato->id}}" 
                @if(old('contatos'))
                {{in_array($contato->id, old('contatos')) ? 'selected' : ''}}
                @endif
            >{{ $contato->nome }}</option>
            @endforeach

        </select>
    </div>
    <button type="submit" class="btn btn-dark mt-2">Criar</button>
</form>

@endsection
