@extends('layout.layout')

@section('titulo', 'Contatos')

@section('breadcrumb')
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb bg-light fs-6 ms-3 ">
        <li class="active">Contatos</li>
    </ol>
</nav>
@endsection

@section('conteudo')

@include('layout.mensagem', ['mensagem' => $mensagem])

<p>
    <a href="{{ route('contato.create')}}" class="btn btn-primary btn-sm"><i class="bi bi-plus"></i></a>
</p>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Nome</th>
            <th class="text-center">Endereços</th>
            <th class="text-center">Telefones</th>
            <th class="text-center">Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($contatos as $contato)
        <tr>
            <td>{{ $contato->nome}}</td>
            <td class="text-center">{{ $contato->enderecos_count }}</td>
            <td class="text-center">{{ $contato->telefones_count }}</td>
            <td class="text-center">
                <form action="{{ route('contato.destroy', $contato) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('contato.show', $contato) }}" class="btn btn-sm btn-secondary"><i class="bi bi-eye"></i></a>
                    <a href="{{ route('contato.edit', $contato) }}" class="btn btn-sm btn-secondary"><i class="bi bi-pencil"></i></a>
                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                </form>
            </td>
        </tr>
            
        @empty
        <tr>
            <td>Sem Contato</td>
            <td>N/A</td>
            <td>N/A</td>
            <td>N/A</td>
        </tr>
        @endforelse

    </tbody>
</table>
@if ($contatos->links()->paginator->hasPages())
    <div class="text-center">
        @if ($contatos->links()->paginator->count() != 0)
        {{ $contatos->links() }}
        @else
        <script>window.location.href = "{{ route('contato.index') }}"</script>
        @endif
    </div>
@endif

@endsection
