@extends('layout.layout')

@section('titulo', 'Contatos')

@section('conteudo')

<p class="mt-2">
    <a href="{{ route('contato.create')}}" class="btn btn-primary btn-sm"><i class="bi bi-plus"></i></a>
</p>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Nome</th>
            <th class="text-center">Email</th>
            <th class="text-center">Endereços</th>
            <th class="text-center">Telefones</th>
            <th class="text-center">Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($contatos as $contato)
        <tr>
            <td>{{ $contato->nome}}</td>
            <td class="text-center">{{ $contato->email}}</td>
            <td class="text-center">{{ $contato->enderecos_count }}</td>
            <td class="text-center">{{ $contato->telefones_count }}</td>
            <td class="text-center">
                <form action="{{ route('contato.destroy', $contato) }}" method="POST" onsubmit="return confirm('Tem certeza?')">
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
            <td class="text-center">N/A</td>
            <td class="text-center">N/A</td>
            <td class="text-center">N/A</td>
            <td class="text-center">N/A</td>
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
