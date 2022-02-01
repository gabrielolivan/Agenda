<form action="{{ route('contato.destroy', $id) }}" method="POST">
    @csrf
    @method('DELETE')
    <a href="{{ route('contato.show', $id) }}" class="btn btn-sm btn-secondary"><i class="bi bi-eye"></i></a>
    <a href="{{ route('contato.edit', $id) }}" class="btn btn-sm btn-secondary"><i class="bi bi-pencil"></i></a>
    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
</form>